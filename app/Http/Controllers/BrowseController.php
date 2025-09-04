<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BrowseController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'users'); // Get the 'type' query parameter, default to 'users'
        $shuffleUsers = ($type === 'users'); // Set the $shuffleUsers variable based on the 'type' value

        $users = User::inRandomOrder()->limit(9)->get(); // Retrieve 9 random users from the database
        $posts = Post::inRandomOrder()->limit(6)->get(); // Retrieve 6 random posts from the database

        $shufflePosts = Post::inRandomOrder()->limit(6)->get(); // Retrieve 6 shuffled posts from the database

        return view('search.browse', compact('users', 'posts', 'shuffleUsers', 'shufflePosts'));
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $searchType = $request->input('search_type', 'users');

        if ($searchType === 'users') {
            // Search for users
            $users = User::where(function ($query) use ($searchTerm) {
                $query->where('username', 'like', '%' . $searchTerm . '%')
                    ->orWhere('name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('prodi', 'like', '%' . $searchTerm . '%');
            })->get();

            $posts = null;
        } else {
            // Search for posts
            $users = null;
            $posts = Post::where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhereHas('user', function ($query) use ($searchTerm) {
                        $query->where('username', 'like', '%' . $searchTerm . '%')
                            ->orWhere('name', 'like', '%' . $searchTerm . '%');
                    })
                    ->orWhereHas('category', function ($query) use ($searchTerm) {
                        $query->where('name', 'like', '%' . $searchTerm . '%');
                    });
            })->get();
        }

        return view('search.browse', compact('users', 'posts', 'searchTerm', 'searchType'));
    }
}
