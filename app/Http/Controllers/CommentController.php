<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment([
            'content' => $request->input('content'),
            'user_id' => auth()->user()->id,
            'post_id' => $request->input('post_id'),
        ]);

        $comment->save();

        toastr()->success('Comment posted successfully.');
        return redirect()->back();
    }

    public function destroy(Comment $comment)
    {
        // Check if the authenticated user is the owner of the comment or has the "admin" role
        if (auth()->user()->id !== $comment->user_id && auth()->user()->role !== 'admin') {
            toastr()->error('You are not authorized to delete this comment.');
            return redirect()->back();
        }

        $comment->delete();
        toastr()->success('Comment deleted successfully.');
        return redirect()->back();
    }

    
}
