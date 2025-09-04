<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Management Account</title>
    <link rel="stylesheet" href="{{ asset('cssfile/user/update.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- extra plugins -->


</head>
@extends('layouts.layout')
@section('isi')

    <body>



        <div class="container-management">
            <div class="title">Manajemen Akun</div>
            <div class="profile">Profil</div>
            <div class="card"></div>
            @auth
                @if (!empty($user->avatar))
                    <img class="profile-picture" src="/asset/user/{{ $user->email }}/profile/{{ $user->avatar }}">
                @else
                    <img class="profile-picture" src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}">
                @endif
                <div class="username">{{ $user->username }}</div>
                <div class="prodi">{{ $user->prodi }}</div>
                <div class="bio">BIO</div>
                @if (!empty($user->bio))
                    <div class="bio-text">{{ $user->bio }}</div>
                @else
                    <div class="bio-text">No bio yet.</div>
                @endif
                <div class="change-picture">Change Profile Picture</div>
            @else
                <img src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}" class="profile-picture">
                <div class="username">Username</div>
                <div class="prodi">Prodi</div>
                <div class="bio">BIO</div>
                <div class="bio-text">Write your bio here.</div>
            @endauth

            @auth
                <form method="POST" action="{{ route('admin.avatarstore', $user) }}" enctype="multipart/form-data">
                    @csrf

                    <div>
                        <div class="change-picture">Change Profile Picture</div>
                        <div class="picture-container"> </div>

                        <img src="{{ asset('htmlimg/viewfile/vk-upload-1.png') }}" id="output" class="picture-container-3" />
                        <!-- <img src="{{ asset('htmlimg/viewfile/vk-upload-3.png') }}" class="picture-container-4" alt=""> -->

                        <input id="avaatar" type="file"class="picture-container-2 @error('avatar') is-invalid @enderror"
                            name="avatar" value="{{ old('avatar') }}" onchange="loadFile(event)" autocomplete="avatar" />

                    </div>

                    @if ($user->avatar)
                        <button type="submit" name="upload_avatar" class="update-button">Change</button>
                    @else
                        <button type="submit" name="upload_avatar" class="update-button">Upload</button>
                    @endif

                    @if ($user->avatar)
                        <button type="submit" name="delete_avatar" class="delete-button">Delete</button>
                    @endif
                @endauth

            </form>

            @auth
                <form method="POST" action="{{ route('admin.update', $user) }}">
                    @csrf
                    @method('PUT')

                    <label class="name-label" for="name">Name:</label>
                    <input class="name-input" type="text" name="name" value="{{ $user->name }}">

                    <!-- <img src="{{ asset('htmlimg/viewfile/vk-lock.png') }}" class="name-input-icon" alt=""> -->


                    <label class="email-label" for="email">Email:</label>
                    <input class="email-input" type="email" name="email" value="{{ $user->email }}">

                    <!-- <img src="{{ asset('htmlimg/viewfile/vk-lock.png') }}" class="email-input-icon" alt=""> -->


                    <label class="username-label" for="username">Username:</label>
                    <input class="username-input" type="text" name="username" value="{{ $user->username }}">

                    <label class="prodi-label" for="prodi">Program Studi:</label>
                    <select class="prodi-input" name="prodi">
                        <option value="Teknik Informatika" {{ $user->prodi === 'Teknik Informatika' ? 'selected' : '' }}>
                            Teknik
                            Informatika</option>
                        <option value="Multimedia dan Jaringan"
                            {{ $user->prodi === 'Multimedia dan Jaringan' ? 'selected' : '' }}>Multimedia dan Jaringan
                        </option>
                        <option value="Animasi" {{ $user->prodi === 'Animasi' ? 'selected' : '' }}>Animasi</option>
                        <option value="Teknik Geomatika" {{ $user->prodi === 'Teknik Geomatika' ? 'selected' : '' }}>Teknik
                            Geomatika</option>
                        <option value="TRPL" {{ $user->prodi === 'TRPL' ? 'selected' : '' }}>TRPL</option>
                    </select>

                    <label class="bio-label" for="bio">Bio:</label>
                    <textarea class="bio-input" name="bio">{{ $user->bio }}</textarea>

                    <label class="password-label" for="password">New Password:</label>
                    <input class="password-input" type="password" name="password">

                    <label class="confirm-password-label" for="password_confirmation">Confirm New Password:</label>
                    <input class="confirm-password-input" type="password" name="password_confirmation">

                    <button class="save-button" type="submit">Update Profile</button>
                @endauth
            </form>

        </div>
        </div>

        <!-- local javascript -->
        <script src="{{ asset('jsfile/update.js') }}"></script>

        <!-- framework javascript -->
        <script src=""></script>


        <!-- short script -->
        <script></script>
    @endsection
</body>

</html>
