<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('cssfile/categories/create.css') }}">
    <!-- Add the Font Awesome CSS link here -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Create Category</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
</head>

<body>
    @extends('layouts.layout')

    @section('isi')
        <div class="post-card">
            <div class="post-card-header">
                <h1 class="post-card-title">Edit Category</h1>
                <div class="post-card-buttons">
                    <a href="{{ route('categories.index') }}" class="post-card-button">Back</a>
                    <button style="cursor: pointer;" type="submit" form="categoryForm"
                        class="post-card-button">Submit</button>
                </div>
            </div>
            <div class="post-card-body">
                <form id="categoryForm" action="{{ route('categories.update', $category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="image" class="form-label">Thumbnail Category</label>
                        <div class="upload-container">
                            <label for="image" class="upload-label">
                                <div class="upload-icon">
                                    <i class="fa fa-cloud-upload-alt"></i>
                                </div>
                                <span id="file-chosen">Upload / Drag file</span>
                            </label>
                            <input type="file" name="image"
                                style="position: absolute; width: 0; height: 0; opacity: 0; overflow: hidden; pointer-events: none;"
                                id="image" class="form-control"
                                value="{{ asset('category_images/' . basename($category->image)) }}">
                            <img src="{{ asset('category_images/' . basename($category->image)) }}" id="output"
                                alt="Preview" class="image-preview" />
                            <button type="button" id="cancelButton" class="cancel-button" style="display: none;"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" name="name" id="title" class="form-control invisible"
                            placeholder="Category Name" value="{{ $category->name }}" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="route" id="route" class="form-control invisible"
                            placeholder="Category Route" value="{{ $category->route }}" required>
                    </div>

                    <div class="form-group">
                        <textarea name="description" id="description" class="form-control invisible description-textarea"
                            placeholder="Description" value="{{ $category->description }}" required>{{ $category->description }}</textarea>
                    </div>
                </form>

                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <script>
            const input = document.getElementById('image');
            const output = document.getElementById('output');
            const cancelButton = document.getElementById('cancelButton');

            input.addEventListener('change', (e) => {
                const file = e.target.files[0];
                const reader = new FileReader();

                reader.onload = (e) => {
                    output.src = e.target.result;
                    output.style.display = 'block';
                    cancelButton.style.display = 'block';
                };

                reader.readAsDataURL(file);
            });

            cancelButton.addEventListener('click', () => {
                input.value = '';
                output.src = '';
                output.style.display = 'none';
                cancelButton.style.display = 'none';
            });
        </script>
        <!-- Add the Font Awesome script link here -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    @endsection
</body>

</html>
