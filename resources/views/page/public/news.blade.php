<!DOCTYPE html>
<html>

<head>
    <title>News</title>
    <link rel="stylesheet" href="{{ asset('cssfile/public/news.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">

</head>

<body>
    @extends('layouts.layout')
    @section('isi')
        <div class="container">
            @forelse ($posts as $post)
                <div class="fyp-card">
                    <!-- User Details -->
                    <div class="user-details">
                        @if ($post->user->avatar)
                            <img class="avatar" src="/asset/user/{{ $post->user->email }}/profile/{{ $post->user->avatar }}"
                                alt="User Avatar">
                        @else
                            <img class="avatar" src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}" alt="Dummy Avatar">
                        @endif
                        <h2 class="username">{{ $post->user->username }}</h2>
                    </div>

                    <!-- Project Image -->
                    @if (!empty($post->thumbnail))
                    <a href="{{ route('posts.show', $post->id) }}"><img class="project-image"
                            src="{{ asset($post->thumbnail) }}" alt="Post Image"></a>
                            @elseif (!empty($post->images) && $post->images->first())
                            <a href="{{ route('posts.show', $post->id) }}"><img class="project-image"
                                src="{{ asset($post->images->first()->path) }}" alt="Post Image"></a>
                            @else
                            <a href="{{ route('posts.show', $post->id) }}"><img class="project-image"
                                src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}" alt="Post Image"></a>
                            @endif

                    <!-- Project Details -->
                    <div class="project-details">
                        <h3 class="title">{{ $post->title }}</h3>
                        <p class="category">{{ $post->category->name }}</p>
                        <p class="body">{{ Str::limit($post->body, 150) }} <a style="color:black;"
                                href="{{ route('posts.show', $post->id) }}"> View
                                more</a> </p>
                        <p class="posted-date">Posted: {{ $post->created_at->format('F d, Y') }}</p>
                    </div>
                </div>
            @empty
                <h1 style="text-align: center">Nothing is here :(</h1>
            @endforelse
        </div>
    @endsection
</body>

</html>
