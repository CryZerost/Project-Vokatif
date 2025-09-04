<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('cssfile/posts/crud.css') }}">
    <!-- Add the Font Awesome CSS link here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>

    </style>
    <title>Create Post</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
</head>

<body>
    @extends('layouts.layout')

    @section('isi')
        <div class="post-card">
            <div class="post-card-header">
                <h1 class="post-card-title">Create Post</h1>
                <div class="post-card-buttons">
                    <a href="{{ route('posts.index') }}" class="post-card-button">Back</a>
                    <button style="cursor: pointer;" type="submit" form="postForm" class="post-card-button">Submit</button>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <div class="form-group">
                    <div class="user-profile">
                        @if (!empty(Auth::user()->avatar))
                            <img src="/asset/user/{{ Auth::user()->email }}/profile/{{ Auth::user()->avatar }}"
                                class="profile-picture">
                        @else
                            <img src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}" class="profile-picture">
                        @endif
                        <span class="username">{{ Auth::user()->username }}</span>
                    </div>
                </div>
                <div class="post-card-body">
                    <form id="postForm" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="thumbnail">Thumbnail:</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control" onchange="previewThumbnail()">
                            <div class="thumbnail-preview"></div>
                            @error('thumbnail')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Description">{{ old('body') }}</textarea>
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title"
                                required>
                        </div>

                        <div class="form-group">
                            <input type="url" name="link" id="link" class="form-control" placeholder="External Url link">
                            @error('link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="url" name="demo" id="demo" class="form-control" placeholder="Demo video Url (youtube)">
                            @error('demo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        
                        <div class="form-group">
                            <input type="url" name="teaser" id="teaser" class="form-control" placeholder="Teaser Url (youtube)">
                            @error('teaser')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>

                        <div class="form-group">
                            <select name="category_id" id="category_id" class="form-control" required>
                                <option value="" selected disabled>Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div style="opacity: 0;" class="form-group">
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
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
                            <!-- Image previews will be added here -->
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
                var thumbnailInput = document.querySelector('input[name="thumbnail"]');
                var thumbnailFile = thumbnailInput.files[0];
                var thumbnailPreview = document.querySelector('.thumbnail-preview');

                if (thumbnailFile) {
                    if (/\.(jpe?g|png|gif)$/i.test(thumbnailFile.name)) {
                        var reader = new FileReader();

                        reader.addEventListener('load', function() {
                            thumbnailPreview.innerHTML = '';

                            var image = new Image();
                            image.className = 'preview-image';
                            image.title = thumbnailFile.name;
                            image.src = this.result;
                            thumbnailPreview.appendChild(image);
                        });

                        reader.readAsDataURL(thumbnailFile);
                    } else {
                        alert('Invalid file format. Please select a valid image file (JPEG, PNG, or GIF) for the thumbnail.');
                    }
                } else {
                    thumbnailPreview.innerHTML = '';
                }
            }

            function previewImages() {
                var previewContainer = document.querySelector('.image-preview-container');
                var files = Array.from(document.querySelector('input[name="images[]"]').files);

                if (files.length > 10) {
                    alert('Maximum 10 images can be selected.');
                    return;
                }

                previewContainer.innerHTML = '';

                files.forEach(function(file) {
                    if (/\.(jpe?g|png|gif)$/i.test(file.name)) {
                        var reader = new FileReader();

                        reader.addEventListener('load', function() {
                            var imageContainer = document.createElement('div');
                            imageContainer.className = 'preview-image-container';

                            var image = new Image();
                            image.className = 'preview-image';
                            image.title = file.name;
                            image.src = this.result;
                            imageContainer.appendChild(image);

                            var cancelButton = document.createElement('button');
                            cancelButton.className = 'cancel-button';
                            cancelButton.innerHTML = '<i class="fas fa-times"></i>';
                            cancelButton.addEventListener('click', function() {
                                imageContainer.remove();
                            });
                            imageContainer.appendChild(cancelButton);

                            previewContainer.appendChild(imageContainer);
                        });

                        reader.readAsDataURL(file);
                    }
                });
            }
        </script>
    @endsection
</body>

</html>
