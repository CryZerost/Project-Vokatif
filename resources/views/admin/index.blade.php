<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('cssfile/admin/index.css') }}">
    <style>

    </style>
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
                        <h1>Admin Dashboard</h1>
                    </div>
                    <div class="search-container">
                        <form action="{{ route('admin.index') }}" method="GET" class="search-form">
                            <input type="text" name="search" placeholder="Search users">
                            <button type="submit" class="search-button">Search</button>
                        </form>
                    </div>
                </div>
                <div class="right-section">
                    <a href="{{ route('admin.create') }}" class="create-button">
                        <button class="profile-btn">+ Create User</button>
                    </a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Avatar</th>
                        <th>Prodi</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ Str::words($user->name, 2) }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td>
                                @if (!empty($user->avatar))
                                    <img class="category-image"
                                        src="/asset/user/{{ $user->email }}/profile/{{ $user->avatar }}">
                                @else
                                    <img class="category-image" src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}">
                                @endif
                            </td>
                            <td>{{ $user->prodi }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('admin.edit', $user) }}" class="edit-button">Edit</a>
                                    <form action="{{ route('admin.destroy', $user) }}" method="POST" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="pagination-container">
                {{ $users->links() }}
            </div>

        </div>
    @endsection


</body>

</html>
