<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\DashboardCarousel;
use App\Models\Frame;
use Illuminate\Http\Request;

class FrameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
//    public function store(Request $request)
//    {
//        // validate the request data
//        $validatedData = $request->validate([
//            'frame_name' => 'required|string',
//            'frame_filename' => 'required|string',
//            'frame_image' => 'required|image'
//        ]);
//
//        // Create a new frame instance
//        $frame = new Client();
//        $frame->title = $validatedData['frame_name'];
//        $frame->filename = $validatedData['frame_filename'];
//
//        // upload the frame image
//        if ($request->hasFile('frame_image')) {
//            $frameFile = $request->file('frame_image');
//            $framePath = '/frames/photos/' . $frameFile->getClientOriginalName();
//            $frameFile->move(public_path('frames/photos'), $framePath);
//            $frame->photo_url = $framePath;
//        }
//        // Save the frame to the database
//        $frame->save();
//
//        // Redirect or return a response as needed
//        return redirect()->route('dashboard.edit', ['id' => $frame->client_id]);
//
//    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
