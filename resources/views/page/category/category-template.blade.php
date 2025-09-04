<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vokatif</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/category-template.css') }}">

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
        <h2><a class="post-category-title" href="">Categories</a></h2>
        <header class="header">
            <img src="{{ asset('htmlimg/viewfile/vk-header-1.png') }}" alt="" class="header-vk-1">
        </header>

        <div class="post-container">

            <div class="post-card">
                <div class="post-image">
                    <span class="category-tag">Category</span>
                    <img class="post-like" src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}" alt="">
                    <button class="btn-like">View More</button>
                    <button class="btn-like-2">Like</button>
                </div>

                <div class="post-info">
                    <img src="{{ asset('htmlimg/viewfile/vk-blank-user-profile.png') }}" alt="">
                    <div class="post-text-group">
                        <h2 class="post-title">Title</h2>
                        <p class="post-user">Username</p>
                        <!-- <span class="post-category"><small>Photography</small></span>
                                <p class="post-short-desc">Short Description about post</p> -->
                    </div>
                </div>
            </div>

        </div>
    @endsection
</body>

</html>
