<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFrameRequest;
use App\Models\Client;
use App\Models\Frame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FrameController extends Controller
{
    public function store(Request $request, Client $client)
    {
        // Upload the frame image
        if ($request->hasFile('frame_image')) {
            $frameFile = $request->file('frame_image');
            $framePath = '/frames/photos/' . $frameFile->getClientOriginalName();
            $frameFile->move(public_path('frames/photos'), $framePath);
        }

        // Create a new frame instance
        $client->frames()->create([
            'title' => $request->frame_name,
            'filename' => $request->frame_filename,
            'photo_url' => $framePath ?? null
        ]);

        // Redirect or return a response as needed
        return redirect()->route('dashboard.edit', $client->id)
            ->with('success', 'Client deleted successfully.');

    }
    public function edit(Frame $frame)
    {
        $frame->load('client'); // Load the client relationship
        $client = $frame->client;
        $filteredColumns = array_diff(array_keys($frame->getAttributes()), ['id', 'created_at', 'updated_at', 'sort',
            'edit', 'client_id','margin_top','margin_bottom', 'margin_left', 'margin_right', ]);
        $frame->photo_url = str_replace('_', '', $frame->photo_url);

        return view('dashboard.frame.edit', compact('client','frame', 'filteredColumns'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFrameRequest $request, Frame $frame)
    {
        // Validate the request data
        $request->validated();

        // Handle the image upload
        if ($request->hasFile('photo_url')){
            $fileUrl = $request->file('photo_url');
            $photoUrlPath = '/frames/photos/' . $fileUrl->getClientOriginalName();
            $fileUrl->move(public_path('frames/photos'), $photoUrlPath);
            $frame->update(['photo_url' => $photoUrlPath]);
        }
        $frame_id = $frame->client_id;

        // Update the frame attributes
        $frame->update([
            'title' => $request->title,
            'filename' => $request->filename,
        ]);


        return redirect()->route('dashboard.edit', ['client' => $frame_id]);
    }

    public function destroy(Frame $frame)
    {
        // Delete the client
        $frame->delete();

        // Redirect to the appropriate page
        return back()->with('success', 'Frame deleted successfully.');
    }
    // to save sort
    public function saveSorter(Request $request)
    {
        $order = $request->input('order');

        if (!is_array($order)) {
            return response()->json(['message' => 'Failed to decode order'], 400); // Bad Request
        }

        Log::info("Order Array:", $order);

        try {
            DB::transaction(function () use ($order) {
                foreach ($order as $index => $frameId) {
                    $frame = Frame::find($frameId);
                    if ($frame) {
                        $frame->sort = $index + 1;
                        $frame->save();
                        Log::info("Frame {$frame->id} saved with sort value: {$frame->sort}");
                    }
                }
            });

            return response()->json(['message' => 'Order saved successfully']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }



}
