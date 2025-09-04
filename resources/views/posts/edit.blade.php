<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('cssfile/posts/crud.css') }}">
    <!-- Add the Font Awesome CSS link here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* New CSS styles for thumbnail preview */
        .thumbnail-preview img {
            max-width: 100%;
            max-height: 200px;
        }

        /* Additional CSS styles for image preview */
        .image-preview-container img {
            max-width: 100%;
            max-height: 200px;
        }
    </style>
    <title>Edit Post {{ $post->title }}</title>
</head>

<body>
    @extends('layouts.layout')

    @section('isi')
        <div class="post-card">
            <div class="post-card-header">
                <h1 class="post-card-title">Edit Post</h1>
                <div class="post-card-buttons">
                    <a href="{{ route('posts.index') }}" class="post-card-button">Back</a>
                    <button style="cursor: pointer;" type="submit" form="postForm" class="post-card-button">Update</button>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="user-profile">
                        @if (!empty($user->avatar))
                            <img class="profile-picture" src="/asset/user/{{ $user->email }}/profile/{{ $user->avatar }}">
                        @else
                            <img src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}" class="profile-picture">
                        @endif
                        <span class="username">{{ $user->username }}</span>
                    </div>
                </div>
                <div class="post-card-body">
                    <form id="postForm" action="{{ route('posts.update', $post->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail:</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control"
                                onchange="previewThumbnail()">
                            <div class="thumbnail-preview">
                                @if (!empty($post->thumbnail))
                                    <img src="{{ asset($post->thumbnail) }}" alt="Thumbnail Preview">
                                @endif
                            </div>
                            @error('thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control"
                                placeholder="Description">{{ old('body', $post->body) }}</textarea>
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                                value="{{ old('title', $post->title) }}" required>
                        </div>

                        <div class="form-group">
                            <input type="url" name="link" id="link" class="form-control" placeholder="Link"
                                value="{{ old('link', $post->link) }}">
                            @error('link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="demo">Demo URL:</label>
                            <input type="url" name="demo" id="demo" class="form-control" placeholder="Demo video Url (youtube)" value="{{ old('demo', $post->demo) }}">
                            @error('demo')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                
                        <div class="form-group">
                            <label for="teaser">Teaser URL:</label>
                            <input type="url" name="teaser" id="teaser" class="form-control" placeholder="Teaser Url (youtube)" value="{{ old('teaser', $post->teaser) }}">
                            @error('teaser')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="" selected disabled>Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $post->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div style="opacity: 0;" class="form-group">
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="images">Images:</label>
                            <input type="file" name="images[]" id="images" class="form-control" multiple
                                onchange="previewImages()" accept="image/*">
                        </div>

                        <div class="image-preview-container">
                            @foreach ($post->images as $image)
                                <div class="preview-image-container">
                                    <img class="preview-image" src="{{ asset($image->path) }}" alt="{{ $image->name }}">
                                    <button class="cancel-button" onclick="removeImage(this)">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <!-- Add the Font Awesome script link here -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
        <script>
            // Move the previewThumbnail function declaration before the previewImages function
            function previewThumbnail() {
                // ...
            }

            function previewImages() {
                // ...
            }
            
            function removeImage(element) {
                var container = element.parentNode;
                container.remove();
            }
        </script>
    @endsection
</body>

</html>
