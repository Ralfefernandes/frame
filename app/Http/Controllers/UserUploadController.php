<?php

namespace App\Http\Controllers;

use App\Models\Frame;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch data from 'frames' table
        $frames = Frame::all();
        return view('user-upload.index', ['frames' => $frames]);
    }

    public function uploadPhoto(Request $request, Frame $frames)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the validation rules as needed
            'title' => 'required|string',
        ]);

        // Process the uploaded photo
        if ($request->hasFile('photo')) {
            $photoFile = $request->file('photo');
            $photoPath = 'frames/photos/';
            $photoFileName = $photoFile->getClientOriginalName();
            $photoFile->move(public_path($photoPath), $photoFileName);

            // Save the photo URL to the database
            $frame = new Frame();
            $frame->photo_url = $photoPath . $photoFileName;
            $frame->title = $request->input('title'); // Add the title to the frame model
            $frame->save();

            // Optionally, you can redirect back to the upload form after successful upload
            return view('user-upload.upload');
        }
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

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
