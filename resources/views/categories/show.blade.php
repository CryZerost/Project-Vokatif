<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $category->name }}</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/categories/show.css') }}">

    <!-- extras -->
    <!--
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
        crossorigin="anonymous">
    -->

</head>

<body>

    @extends('layouts.layout')
    @section('isi')
        <select class="post-category-title" onchange="location = this.value;">
            <option value="{{ route('show.category') }}" selected>Select Category &#9662; </option>
            @foreach ($categories as $cat)
                <option value="{{ route('categories.show', $cat->id) }}" @if ($category->id === $cat->id) selected @endif>
                    {{ Str::limit($cat->name, 25) }} &#9662; </option>
            @endforeach
        </select>


        <header class="header">
            <img src="{{ $category->image }}" alt="{{ $category->name }}" alt="" class="header-vk-1">
        </header>

        <div class="post-container">
            @php
                $randomPosts = $category->posts->shuffle();
            @endphp
            @forelse ($randomPosts as $post)
                <div class="post-card">
                    <div class="post-image">
                        <!-- <span class="category-tag"></span> -->
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

                        <!-- <a href="{{ route('posts.show', $post->id) }}" class="btn-like">View More</a> -->
                        <button class="btn-like-2">Like</button>
                    </div>

                    <div class="post-info">
                        @if ($post->user->avatar)
                            <img class="post-like-b"
                                src="/asset/user/{{ $post->user->email }}/profile/{{ $post->user->avatar }}"
                                alt="User Avatar">
                        @else
                            <img class="post-like-b" src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}"
                                alt="Dummy Avatar">
                        @endif
                        <div class="post-text-group">
                            <h2 class="post-title">{{ Str::limit($post->title, 15) }}</h2>
                            <p class="post-user">{{ $post->user->username }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p style="text-align: center">There's is no post from anyone here. :(</p>
            @endforelse
        </div>
        <script>
            function changeCategoryPage() {
                const selectElement = document.getElementById('category-select');
                const selectedValue = selectElement.value;
                window.location.href = selectedValue;
            }
        </script>
    @endsection
</body>

</html>
