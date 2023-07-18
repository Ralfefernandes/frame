<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientDataEditRequest;
use App\Http\Requests\ClientDataRequest;
use App\Models\Client;
use App\Models\Frame;
//use App\Traits\ClientAttributeTrait;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
//    use ClientAttributeTrait;
    private $modifiedClients;

    // Other methods...

    public function createClient(ClientDataRequest $request)
    {
        $user = Auth::user();

        $validatedData = $request->validated();
        $client = new Client;

        $client->name = $validatedData['name'];
        $client->primary_color = $validatedData['primary_color'];
        $client->second_color = $validatedData['second_color'];
        $client->collect_email = $validatedData['collect_email'];
        $client->consent_for_questions = $validatedData['consent_for_questions'];



        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoPath = '/klanten/logo/' . $logoFile->getClientOriginalName();
            $logoFile->move(public_path('klanten/logo'), $logoPath);
            $client->logo = $logoPath;
        }

        $client->save();


        return response()->json(['message' => 'Client created successfully']);
    }

    public function index(Request $request)
    {
        $search = $request->input('search');

        $clientsQuery = Client::query();

        if ($search) {
            $clientsQuery->where('name', 'LIKE', "%$search%");
            // Add more conditions for searching other fields if needed
        }

        $allClients = $clientsQuery->get();

        $modifiedClients = $allClients->map(function ($client) {
            $client->collect_email = $client->collect_email ? 'Yes' : 'No';
            $client->consent_for_questions = $client->consent_for_questions ? 'Yes' : 'No';
            return $client;
        });

        $width = 50;
        $height = 50;

        return view('dashboard.index', compact('modifiedClients', 'width', 'height'));
    }


    public function destroy($id)
    {
        // Retrieve the client by ID
        $client = Client::find($id);

        // Check if the client exists
        if (!$client) {
            return redirect()->back()->with('error', 'Client not found.');
        }

        // Delete the client
        $client->delete();
        // Redirect to the appropriate page
        return redirect()->route('dashboard.index')->with('success', 'Client deleted successfully.');
    }

    public function edit($id, Request $request)
    {
        $client = Client::findOrFail($id);
        $modifiedClients = $this->transformBooleanValues([$client]);

        // image
        $width = 50;
        $height = 50;


        $frames = Frame::with('client')->get();

//        $frame = $frames->first(); // Get the first frame from the collection
        return view('dashboard.edit', compact('frames' ,'client', 'modifiedClients', 'width', 'height'));
    }


    // frame store
    public function store(Request $request)
    {
        // validate the request data
        $validatedData = $request->validate([
            'frame_name' => 'required|string',
            'frame_filename' => 'required|string',
            'frame_image' => 'required|image'
        ]);

        // Create a new frame instance
        $frame = new Client();
        $frame->title = $validatedData['frame_name'];
        $frame->filename = $validatedData['frame_filename'];

        // upload the frame image
        if ($request->hasFile('frame_image')) {
            $frameFile = $request->file('frame_image');
            $framePath = '/frames/photos/' . $frameFile->getClientOriginalName();
            $frameFile->move(public_path('frames/photos'), $framePath);
            $frame->photo_url = $framePath;
        }
        // Save the frame to the database
        $frame->save();

        // Redirect or return a response as needed
        return redirect()->route('dashboard.edit', ['id' => $frame->client_id]);

    }
    private function transformBooleanValues($clients)
    {
        return collect($clients)->map(function ($client) {
            $client->collect_email = $client->collect_email ? 'Yes' : 'No';
            $client->consent_for_questions = $client->consent_for_questions ? 'Yes' : 'No';
            return $client;
        });
    }


    public function update(ClientDataEditRequest $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validated();


        // Find the client
        $client = Client::findOrFail($id);

        // Update the client attributes
        $client->name = $validatedData['name'];
        $client->primary_color = $validatedData['primary_color'];
        $client->second_color = $validatedData['second_color'];
        $client->collect_email = $request->has('collect_email');
        $client->consent_for_questions = $request->has('consent_for_questions');

        // Handle the logo update
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoPath = '/klanten/logo/' . $logoFile->getClientOriginalName();
            $logoFile->move(public_path('klanten/logo'), $logoPath);
            $client->logo = $logoPath;
        }


        // Save the client
        $client->save();

        // Set the width and height for the logo image
        $width = 50;
        $height = 50;

        return redirect()->route('dashboard.index', compact('client',  'width', 'height'));
    }



}
