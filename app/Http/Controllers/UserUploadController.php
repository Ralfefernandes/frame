<?php

namespace App\Http\Controllers;

use App\Http\Requests\CropRequest;
use App\Models\Frame;
use Illuminate\Http\Request;


class UserUploadController extends Controller
{
    private $photoFileName;
    public function index(Request $request)
    {
        // Fetch data from 'frames' table
        $frames = Frame::all();

        return view('user-upload.index', ['frames' => $frames]);
    }


    public function uploadPhoto(Request $request, Frame $frames)
    {

        $file = $request->file('photo');
        if ($file) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
            ]);
            // Move the uploaded photo to the desired directory
            $photoPath = 'frames/photos/';
            $this->photoFileName = $request->file('photo')->getClientOriginalName();
            $request->file('photo')->move(public_path($photoPath), $this->photoFileName);

            $photoFileName = $request->input('photoFileName');

            $this->photoFileName;

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
    public function saveCroppedImage(CropRequest $request, Frame $frame)
    {
        dd($this->photoFileName);
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
;        // Create a new Frame instance with the new data
        $newFrame = Frame::create([
            'title' => $title,
            'filename' => $filename,
            'margin_top' => $marginTop,
            'margin_bottom' => $marginBottom,
            'margin_left' => $marginLeft,
            'margin_right' => $marginRight,
            'edit' => $marginDetails,
            'client_id' => $frame->id,
        ]);
        $newFrame->save();
//        $croppedImage->save();
        // Redirect back to the upload page with the frame ID
        return view('user-upload.update', ['frame' => $frame->id]);
    }


}
