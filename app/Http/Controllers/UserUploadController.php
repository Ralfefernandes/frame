<?php

namespace App\Http\Controllers;

use App\Http\Requests\CropRequest;
use App\Models\Client;
use App\Models\Frame;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class UserUploadController extends Controller
{
    private $photoFileName;
    public function index(Request $request, $client_url)
    {
		// step 1 Validate the client_url parameter
        $client = Client::where('url', $client_url)->firstOrFail();
        $frames = $client->frames;

	    // Store the client URL in the session
	    session(['client_url' => $client_url]);

        return view('user-upload.index', ['frames' => $frames, 'client_url' => $client_url]);
    }


    public function uploadPhoto(Request $request, Frame $frames)
    {

	    $file = $request->file('photo');
        if ($file) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            // Move the uploaded photo to the desired directory
            $photoPath = 'frames/photos/';
            $this->photoFileName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path($photoPath), $this->photoFileName);

            // Store the photoFileName in the session
            session(['photoFileName' => $this->photoFileName]);
            // If the validation fails or other required fields are not filled, show the upload form again
            return view('user-upload.upload')->with([
                'photoFileName' => $this->photoFileName,
                'frames' => $frames,

            ]);
        }
        // If no file is uploaded or an error occurs, redirect back to the upload form
        return redirect()->route('user-upload.upload', $frames);
    }

    /**
     * @throws \JsonException
     */

    public function saveCroppedImage(CropRequest $request, Frame $frame, )
    {
		// Retrieve the client URL from the session
	    $client_url = session('client_url');

		// Find the client based on the client URL
	    $client = Client::where('url', $client_url)->firstOrFail();
        // Retrieve photoFileName from the session
        $photoFileName = session('photoFileName');

	    // Define the destination path for the moved file
	    $photoPath = 'frames/photos/';

		// Move the previously uploaded file again
		$success = Storage::disk('public')->move($photoFileName, $photoPath . $photoFileName);
		// Get the validated margin details
        $validatedData = $request->validated();

        // Perform the margin calculation
        $marginTop = $validatedData['dataY'];
        $marginBottom = $validatedData['dataHeight'] - $marginTop;
        $marginLeft = $validatedData['dataX'];
        $marginRight = $validatedData['dataX'] + $validatedData['dataWidth'];

        // Convert the margin details to a JSON string
        $marginDetails = json_encode([
            'marginTop' => $marginTop,
            'marginBottom' => $marginBottom,
            'marginLeft' => $marginLeft,
            'marginRight' => $marginRight,
        ], JSON_THROW_ON_ERROR);


        // validation title and filename
        $title = $validatedData['title'];
        $filename = $validatedData['filename'];

	    // Create a new Frame instance
	    if ($success) {
		    // Store the full path in the database
		    $photoPathInDb = $photoPath . $photoFileName;
		    Frame::create([
			    'title' => $title,
			    'filename' => $filename,
			    'margin_top' => $marginTop,
			    'margin_bottom' => $marginBottom,
			    'margin_left' => $marginLeft,
			    'margin_right' => $marginRight,
			    'edit' => $marginDetails,
			    'photo_url' => $photoPathInDb,
			    'client_id' => $client->id, // Set the client_id based on your logic
		    ]);
	    }

//        $croppedImage->save();
        // Redirect back to the upload page with the frame ID
	    return redirect()->route('user-upload', ['client_url' => $client_url]);
    }


}
