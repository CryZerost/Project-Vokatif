<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categories Settings</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/categories/index.css') }}">
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
                        <h1>Categories Settings</h1>
                    </div>
                </div>
                <div class="right-section">
                    <a href="{{ route('categories.create') }}" class="create-button">
                        <button class="profile-btn">+ Create Categories</button>
                    </a>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Route</th>
                        <th>Image</th> <!-- Add the 'Image' column -->
                        <th>Admin</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- ... -->
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>/category/{{ $category->route }}</td>
                            <td>
                                @if ($category->image)
                                    <img style="aspect-ratio: 3/2; fit-object:cover;"
                                        src="{{ asset('category_images/' . basename($category->image)) }}"
                                        alt="Category Image" class="category-image">
                                @endif
                            </td>
                            <td>{{ $category->admin->name }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('categories.edit', $category) }}" class="edit-button">Edit</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-button">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <!-- ... -->

            </table>
        </div>
    @endsection

</body>

</html>
