<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientDataEditRequest;
use App\Http\Requests\ClientDataRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;


class DashboardController extends Controller
{
//    use ClientAttributeTrait;
    private $modifiedClients;

    // Other methods...

    public function createClient(ClientDataRequest $request)
    {
        Auth::user();

        $validatedData = $request->validated();

        // Generate a unique URL using Str::random(16) and make sure it's unique in the 'clients' table
        do {
            $url = Str::random(4);
        } while (Client::where('url', $url)->exists());

        $validatedData['url'] = $url;

        $client = Client::create($validatedData);

        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoPath = 'klanten/logo/' . $logoFile->getClientOriginalName();
            $logoFile->move(public_path('klanten/logo'), $logoFile->getClientOriginalName()); // just the file name here
            $client->update(['logo' => $logoPath]);
        }
        $client->save();


        return response()->json(['message' => 'Client created successfully', 'url' => $url] );
    }

    public function index(Request $request)
    {

        $search = $request->input('search');

        $modifiedClients = Client::query()
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%");
            })
            ->get()
            ->map(function ($client) {
//                $client->collect_email = $client->collect_email ? 0 : 1;
//                $client->consent_for_questions = $client->consent_for_questions ? 0 : 1;
                return $client;
            });

        $width = 50;
        $height = 50;
        $clients = Client::paginate(10); // Fetch all clients and paginate with 10 clients per page

        return view('dashboard.klant.index', compact('clients','modifiedClients', 'width', 'height'));
    }

    public function destroy(Client $client)
    {


        // Delete the client
        $client->delete();

        // Redirect to the appropriate page
        return redirect()->route('dashboard.index')->with('success', 'Client deleted successfully.');
    }


    public function edit(Client $client, Request $request)
    {
        $modifiedClients = $this->transformBooleanValues([$client]);
        // image
        $width = 50;
        $height = 50;

        // get the frames per id
        $frames = $client->frames()->orderBy('sort')->get();


        $tableName = 'frames';
        $columnNames = Schema::getColumnListing($tableName);
        $desiredColumns = ['title', 'filename', 'photo_url'];
        $filteredColumns = array_intersect($columnNames, $desiredColumns);


        return view('dashboard.klant.edit', compact('filteredColumns',
            'frames', 'client', 'modifiedClients', 'width', 'height'));
    }

    private function transformBooleanValues($clients)
    {
        return collect($clients)->map(function ($client) {
//            $client->collect_email = $client->collect_email ? 0 : 1;
//            $client->consent_for_questions = $client->consent_for_questions ? 0 : 1;
            return $client;
        });
    }


    public function update(ClientDataEditRequest $request, Client $client)
    {
        // Update the client attributes
        $client->update([
            'name' => $request->name,
            'primary_color' => $request->primary_color,
            'second_color' => $request->second_color,
            'collect_email' => $request->input('collect_email', 0),
            'consent_for_questions' => $request->input('consent_for_questions', 0),
        ]);

        // Handle the logo update
        if ($request->hasFile('logo')) {
            $logoFile = $request->file('logo');
            $logoPath = '/klanten/logo/' . $logoFile->getClientOriginalName();
            $logoFile->move(public_path('klanten/logo'), $logoPath);
            $client->update(['logo' => $logoPath]);
        }

        $client->save();

        // Set the width and height for the logo image
        $width = 50;
        $height = 50;

        return redirect()->route('dashboard.index', compact('client',  'width', 'height'));
    }

}
