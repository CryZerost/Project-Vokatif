<!DOCTYPE html>
<html>

<head>
    <title>Browser</title>
    <link rel="stylesheet" href="{{ asset('cssfile/browser/search.css') }}">
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">

</head>

<body>
    @extends('layouts.layout')
    @section('isi')
        <div class="top-bar">
            <form action="{{ route('browse.search') }}" method="GET" class="search-form">
                @if (isset($searchTerm))
                    <div class="search-button">
                        <input type="text" name="search" class="search-input" placeholder="Search..."
                            value="{{ $searchTerm }}">
                        <button type="submit" class="image-button">
                            <img src="{{ asset('htmlimg/viewfile/vk-search-2.png') }}" class="search-icon"
                                alt="Search Icon">
                        </button>
                    </div>
                @else
                    <div class="search-button">
                        <input type="text" name="search" class="search-input" placeholder="Search...">
                        <button type="submit" class="image-button">
                            <img src="{{ asset('htmlimg/viewfile/vk-search-2.png') }}" class="search-icon"
                                alt="Search Icon">
                        </button>
                    </div>
                @endif

                <div class="search-type">
                    <label>
                        <input type="radio" name="search_type" value="users"
                            {{ isset($searchType) && $searchType === 'users' ? 'checked' : '' }}>
                        Search Users
                    </label>
                    <label>
                        <input type="radio" name="search_type" value="posts"
                            {{ isset($searchType) && $searchType === 'posts' ? 'checked' : '' }}>
                        Search Posts
                    </label>
                </div>
            </form>
        </div>

        @if (isset($searchTerm))
            <!-- Display search results -->
            @if ($searchType === 'users')
                @if ($users->count() > 0)
                    <div class="card-container">
                        <!-- Display users -->
                        @forelse ($users as $user)
                            <!-- User Card Content -->
                            <a href="{{ route('user.show', $user) }}" class="card-link">
                                <div class="card">
                                    <!-- Content for the user card -->
                                    <div class="profile-picture">
                                        @isset($user->avatar)
                                            <img src="{{ asset('asset/user/' . $user->email . '/profile/' . $user->avatar) }}"
                                                alt="Profile Picture">
                                        @else
                                            <!-- Default profile picture -->
                                            <img src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}" alt="">
                                        @endisset
                                    </div>
                                    <div class="card-attribute">
                                        <div class="username">{{ $user->username }}</div>
                                        <div class="prodi">{{ $user->prodi }}</div>
                                        <div class="bio">BIO</div>
                                        @isset($user->bio)
                                            <div class="bio-text">{{ Str::limit($user->bio, 100) }}</div>
                                        @else
                                            <div class="bio-text">No bio yet.</div>
                                        @endisset
                                    </div>
                                </div>
                            </a>
                        @empty
                            <!-- No users found -->
                            <p>No users found.</p>
                        @endforelse
                    </div>
                    <!-- Pagination links -->
                @else
                    <!-- No users found -->
                    <p>No users found.</p>
                @endif
            @else
                @if ($posts->count() > 0)
                    <div class="content-3">
                        <div class="post-container">
                            <!-- Display posts -->
                            @forelse ($posts as $post)
                                <!-- Post Card Content -->
                                <div class="post-card">
                                    <div class="post-image">
                                        <span class="category-tag">{{ $post->category->name }}</span>
                                        @if (!empty($post->thumbnail))
                                    <a href="{{ route('posts.show', $post->id) }}"><img class="post-like"
                                            src="{{ asset($post->thumbnail) }}" alt="Post Image"></a>
                                @else
                                <a href="{{ route('posts.show', $post->id) }}"><img class="post-like"
                                    src="{{ asset($post->images->first()->path) }}" alt="Post Image"></a>
                                @endif
                                        <button class="btn-like-2">Like</button>
                                    </div>
                                    <div class="post-info">
                                        @if ($post->user->avatar)
                                            <img class="post-like-b"
                                                src="/asset/user/{{ $post->user->email }}/profile/{{ $post->user->avatar }}"
                                                alt="User Avatar">
                                        @else
                                            <!-- Default user avatar -->
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
                                <!-- No posts found -->
                                <p>No posts found.</p>
                            @endforelse
                        </div>
                    </div>
                    <!-- Pagination links -->
                @else
                    <!-- No posts found -->
                    <p>No posts found.</p>
                @endif
            @endif
        @endif

        <script>
            window.addEventListener('scroll', function() {
                var topBar = document.querySelector('.top-bar');
                var scrolledClass = 'scrolled';

                if (window.scrollY > 0) {
                    topBar.classList.add(scrolledClass);
                } else {
                    topBar.classList.remove(scrolledClass);
                }
            });
        </script>
    @endsection
</body>

</html>
