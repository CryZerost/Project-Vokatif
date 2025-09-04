<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/public/category.css') }}">
    <style>
        /* Add this style to remove the square outline */
        select.post-category-title {
            appearance: none;
            border: none;
            background: transparent;
            padding: 0.5em;

        }

        select.post-category-title::-ms-expand {
            display: none;
        }

        select.post-category-title:focus {
            outline: none;
        }
    </style>
    <title>Category</title>
</head>

<body>
    @extends('layouts.layout')
    @section('isi')
        <div class="category-core">
            <select class="post-category-title" onchange="location = this.value;">
                <option value="{{ route('show.category') }}" selected>Select Category &#9662;</option>
                @foreach ($categories as $cat)
                    <option value="{{ route('categories.show', $cat->id) }}">
                        {{ Str::limit($cat->name, 25) }} &#9662;
                    </option>
                @endforeach
            </select>

            @if (Auth::check() && Auth::user()->role === 'admin')
                <a href="{{ route('categories.index') }}" class="btn btn-success">
                    <button class="profile-btn"> + Create Categories</button>
                </a>
            @endif

        </div>

        <div class="post-container">
            @foreach ($categories as $category)
                <div class="post-card">
                    <div class="post-image">
                        <a href="{{ route('categories.show', $category->id) }}">
                            <img class="post-like" src="{{ $category->image }}" alt="{{ $category->name }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $categories->links() }}

        <script>
            function redirectToCategory(event) {
                var selectedOption = event.target.value;
                if (selectedOption) {
                    window.location.href = selectedOption;
                }
            }
        </script>
    @endsection
</body>

</html>
