<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vokatif</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/public/home.css') }}">
    <!-- extras -->
    <!--
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
        crossorigin="anonymous">
    -->

    <link rel="stylesheet" href="{{ asset('cssfile/swiper-bundle.min.css') }}">

</head>

<body>

    @extends('layouts.layout')
    @section('isi')
        <header class="header">
            <img class="header-1" src="{{ asset('htmlimg/viewfile/vk-header-0.png') }}" alt="" class="header-vk-1">
        </header>


        <section class="post-section">
            <h2><a class="post-category-title" href="">Top Vote</a></h2>


            <div class="post-list" id="post-list">
                <div class="post-container" id="list">

                    @forelse ($posts->sortByDesc('likes_count')->take(6) as $post)
                        <div class="post-card">
                            <div class="post-image">
                                <span class="category-tag">{{ $post->category->name }}</span>
                                @if (!empty($post->thumbnail))
                                    <a href="{{ route('posts.show', $post->id) }}"><img class="post-like"
                                            src="{{ asset($post->thumbnail) }}" alt="Post Image"></a>
                                            @elseif (!empty($post->images) && $post->images->first())
                                            <a href="{{ route('posts.show', $post->id) }}"><img class="post-like"
                                                src="{{ asset($post->images->first()->path) }}" alt="Post Image"></a>
                                            @else
                                            <a href="{{ route('posts.show', $post->id) }}"><img class="post-like"
                                                src="{{ asset('htmlimg/viewfile/vk-blank-card') }}" alt="Post Image"></a>
                                            @endif
                                <button class="btn-like-2">Total Vote : {{ $post->likes_count }}</button>
                            </div>

                            <div class="post-info">
                                <img class="post-like-b" src="/asset/user/{{ $post->user->email }}/profile/{{ $post->user->avatar }}" alt="">
                                <div class="post-text-group">
                                    <h2 class="post-title">{{ $post->title }}</h2>
                                    <p class="post-user">{{ $post->user->username }}</p>
                                </div>
                            </div>
                        </div>
                        @empty
                   
                    @endforelse




                </div>
            </div>
            <div class="direction">

                <button class="btn-prev" id="next"> <img src="{{ asset('htmlimg/viewfile/vk-arrow-right-2.png') }}"
                        alt=""> </button>
                <button class="btn-next" id="prev"><img src="{{ asset('htmlimg/viewfile/vk-arrow-right-2.png') }}"
                        alt=""> </button>
            </div>
        </section>


        <h2 style=""><a class="post-category-title-2" href="">here you go...</a></h2>

        <div class="search-bar">
            <form action="{{ route('home') }}" method="GET" id="searchForm">
                <input type="text" id="searchInput" name="search" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="post-container-a grid-center">
            @php
                $shuffledPosts = $posts->shuffle();
            @endphp
            @forelse ($shuffledPosts as $post)
                <div class="post-card-a">
                    <div class="post-image-a">
                        <span class="category-tag-a">{{ $post->category->name }}</span>

                        @if (!empty($post->thumbnail))
                        <a href="{{ route('posts.show', $post->id) }}"><img class="post-like"
                                src="{{ asset($post->thumbnail) }}" alt="Post Image"></a>
                                @elseif (!empty($post->images) && $post->images->first())
                                <a href="{{ route('posts.show', $post->id) }}"><img class="post-like"
                                    src="{{ asset($post->images->first()->path) }}" alt="Post Image"></a>
                                @else
                                <a href="{{ route('posts.show', $post->id) }}"><img class="post-like"
                                    src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}" alt="Post Image"></a>
                                @endif
                        <button class="btn-like-2-a">Like</button>
                    </div>

                    <div class="post-info-a">
                        @if ($post->user->avatar)
                            <img class="post-like-b"
                                src="/asset/user/{{ $post->user->email }}/profile/{{ $post->user->avatar }}"
                                alt="User Avatar">
                        @else
                            <img class="post-like-b" src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}"
                                alt="Dummy Avatar">
                        @endif

                        <div class="post-text-group-a">
                            <h2 class="post-title-a">{{ Str::limit($post->title, 15) }}</h2>
                            <p class="post-user-a">{{ $post->user->username }}</p>
                            <!-- <span class="post-category"><small>Photography</small></span>  -->
                            <!-- <p class="post-short-desc">Short Description about post</p>  -->
                        </div>
                    </div>
                </div>
            @empty
                <p>There's is no post from anyone.</p>
            @endforelse
        </div>





        <script src="{{ asset('jsfile/home.js') }}"></script>
    @endsection

    <script></script>

</body>

</html>
