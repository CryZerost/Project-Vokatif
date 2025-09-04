<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PostImage;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
   public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

         $path = $request->file('image')->store('post-images');
        
        $image = new PostImage([
            'path' => $path,
        ]);

        $image->save();

        return response()->json([
            'message' => 'Image uploaded successfully',
            'image' => $image,
        ]);
    }

    public function destroy(PostImage $image)
    {
        $image->delete();

        return response()->json([
            'message' => 'Image deleted successfully',
        ]);
    }
}
