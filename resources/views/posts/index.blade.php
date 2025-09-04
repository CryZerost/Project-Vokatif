<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Index</title>
    <link rel="stylesheet" href="{{ asset('cssfile/posts/index.css') }}">
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
</head>

<body>
    @extends('layouts.layout')

    @section('isi')
        <div class="container">
            <div class="header">
                <div class="left-section">
                    <div class="logo">
                        <img src="{{ asset('htmlimg/viewfile/vk-icon.png') }}" alt="Logo">
                    </div>
                    <div class="header-title">
                        <h1>Posts Settings</h1>
                    </div>
                    <div class="search-container">
                        <form class="search-form" action="{{ route('posts.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Search...">
                            <button type="submit" class="search-button">Search</button>
                        </form>
                    </div>
                </div>
                <div class="right-section">
                    <a href="{{ route('posts.create') }}" class="create-button">
                        <button class="profile-btn">+ Create Post</button>
                    </a>
                </div>
            </div>



            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Body</th>
                        @if (Auth::user()->role === 'admin')
                            <th>User</th>
                        @endif
                        <th>Category</th>
                        <th>Images</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <input type="hidden" class="delete_id" value="{{ $post->id }}">
                            <td>{{ $post->id }}</td>
                            <td>{{ Str::limit($post->title, 15) }}</td>
                            <td>{{ Str::limit($post->body, 30) }}</td>
                            @if (Auth::user()->role === 'admin')
                                <td>{{ Str::words($post->user->name, 2) }}</td>
                            @endif
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <div class="image-gallery">
                                    @foreach ($post->images as $image)
                                        <img src="{{ asset($image->path) }}" alt="Post Image" class="category-image">
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('posts.edit', $post) }}" class="edit-button">Edit</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button btndelete">Delete</button>
                                    </form>
                                    <a href="{{ route('posts.show', $post) }}" class="show-button">Show</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination-container">
                {{ $posts->links() }}
            </div>

        </div>
    @endsection

</body>

</html>
