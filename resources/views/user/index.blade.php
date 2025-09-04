<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('cssfile/user/profile.css') }}">
    <title>Your Profile</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">

</head>
@extends('layouts.layout')
@section('isi')

    <body>
        <header class="profile-header">
            <img class="profile-header-img-1" src="{{ asset('htmlimg/viewfile/vk-header-3.png') }}" alt="">
        </header>
        <div class="container-con">
            <div class="sidebar">
                <div class="profile-picture">
                    @if (!empty(Auth::user()->avatar))
                        <img src="/asset/user/{{ Auth::user()->email }}/profile/{{ Auth::user()->avatar }}">
                    @else
                        <img src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}">
                    @endif
                </div>
            </div>
            <div class="content">
                <div class="content-1">
                    <h1 class="profile-atr-name">{{ Auth::user()->username }}</h1>
                    <h4 class="profile-atr-prefix">{{ Auth::user()->name }}</h4>

                    <h6 style="font-weight: bold;" class="profile-atr-prefix">{{ Auth::user()->prodi }}</h6>
                    <p class="profile-atr-bio-2">Bio</p>
                    @if (empty(auth::user()->bio))
                        <p class="profile-atr-bio-body-2">Write your bio here</p>
                    @else
                        <p class="profile-atr-bio-body-2">{{ auth::user()->bio }}</p>
                    @endif
                    <!-- <a class="profile-btn"><img class="profile-btn-img" src="{{ asset('htmlimg/viewfile/vk-edit-1.png') }}" alt=""></a>
                                                                                                                              <a class="profile-btn"><img class="profile-btn-img" src="{{ asset('htmlimg/viewfile/vk-save-1.png') }}" alt=""></a>
                                                                                                                              -->
                    <a href={{ route('user.update') }}><button class="profile-btn">Edit Profile</button></a>
                    <a href={{ route('posts.create') }}><button class="profile-btn">Create Post</button></a>
                </div>
            </div>

        </div>
        <div class="content-2">
            <p class="profile-atr-bio">Bio</p>
            @if (empty(auth::user()->bio))
                <p class="profile-atr-bio-body">Write your bio here</p>
            @else
                <p class="profile-atr-bio-body">{{ auth::user()->bio }}</p>
            @endif
        </div>

        <div class="content-3">
            <div class="post-container">

                @forelse ($posts as $postItem)
                    <div class="post-card">
                        <div class="post-image">
                            <span class="category-tag">{{ $postItem->category->name }}</span>
                            @if (!empty($postItem->thumbnail))
                            <a href="{{ route('posts.show', $postItem->id) }}"><img class="post-like"
                                    src="{{ asset($postItem->thumbnail) }}" alt="Post Image"></a>
                                    @elseif (!empty($postItem->images) && $postItem->images->first())
                                    <a href="{{ route('posts.show', $postItem->id) }}"><img class="post-like"
                                        src="{{ asset($postItem->images->first()->path) }}" alt="Post Image"></a>
                                    @else
                                    <a href="{{ route('posts.show', $postItem->id) }}"><img class="post-like"
                                        src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}" alt="Post Image"></a>
                                    @endif

                            <button class="btn-like-2">Like</button>
                        </div>
                        <div class="post-info">
                            @if ($postItem->user->avatar)
                                <img class="post-like-b"
                                    src="/asset/user/{{ $postItem->user->email }}/profile/{{ $postItem->user->avatar }}"
                                    alt="User Avatar">
                            @else
                                <img class="post-like-b" src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}"
                                    alt="Dummy Avatar">
                            @endif
                            <div class="post-text-group">
                                <h2 class="post-title">{{ Str::limit($postItem->title, 15) }}</h2>
                                <p class="post-user">{{ $postItem->user->username }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>This user doesn't have any posts yet.</p>
                @endforelse




            </div>
        </div>

        </div>
    </body>
@endsection

</html>
