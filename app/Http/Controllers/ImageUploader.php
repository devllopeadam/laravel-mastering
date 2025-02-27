<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploader extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $image = $request->file('image');
        dd($image);
    }
}
