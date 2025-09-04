<!DOCTYPE html>
<html>

<head>
    <title>My Web Page</title>
    <link rel="stylesheet" href="{{ asset('cssfile/browser.css') }}">
</head>

<body>
    @extends('layouts.layout')
    @section('isi')
        @php
            $user = Auth::user();
        @endphp
        <div class="top-bar">
            <form action="{{ route('browse.search') }}" method="GET" class="search-form">
                <div class="search-button">
                    <input type="text" name="search" class="search-input" placeholder="Search...">
                    <button type="submit" class="image-button">
                        <img src="{{ asset('htmlimg/viewfile/vk-search-2.png') }}" class="search-icon" alt="Search Icon">
                    </button>
                </div>
            </form>
        </div>

        <div class="card-container">
            @forelse ($users->shuffle() as $user)
                <a href="{{ route('user.show', $user) }}" class="card-link">
                    <div class="card">
                        <!-- Content for the second card -->
                        <div class="profile-picture">
                            @isset($user->avatar)
                                <img src="{{ asset('asset/user/' . $user->email . '/profile/' . $user->avatar) }}"
                                    alt="Profile Picture">
                            @else
                                <img src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}" alt="">
                            @endisset
                        </div>


                        <div class="card-attribute">
                            <div class="username">{{ $user->username }}</div>
                            <div class="prodi">{{ $user->prodi }}</div>
                            <div class="bio">BIO</div>
                            @isset($user->bio)
                                <div class="bio-text">{{ $user->bio }}</div>
                            @else
                                <div class="bio-text">No bio yet.</div>
                            @endisset
                        </div>

                    </div>
                </a>
            @empty
                <p>No users found.</p>
            @endforelse

        </div>
        <div class="pagination">
            {{ $users->links() }}
        </div>
    </body>
@endsection

</html>
