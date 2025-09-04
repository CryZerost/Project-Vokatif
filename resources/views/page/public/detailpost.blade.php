<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('cssfile/public/detail-post.css') }}">
</head>

<body>

    @extends('layouts.layout')
    @section('isi')
        <section class="detail-post-container">
            <div class="detail-post-card">
                <div class="slider-wrapper">
                    <div class="slider">

                        <img id="slide-1" src="{{ asset('htmlimg/post-pict/gedung-polibatam-3.jpg') }}" alt="">
                        <img id="slide-2" src="{{ asset('htmlimg/post-pict/gedung-polibatam-2.gif') }}" alt="">
                        <img id="slide-3" src="{{ asset('htmlimg/post-pict/gedung-polibatam.jpeg') }}" alt="">
                        <img id="slide-4" src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}" alt="">
                        <div class="slider-nav">
                            <a href="#slide-1"></a>
                            <a href="#slide-2"></a>
                            <a href="#slide-3"></a>
                            <a href="#slide-4"></a>
                        </div>

                    </div>

                </div>
            </div>
            <div class="detail-post-info">
                <img src="{{ asset('htmlimg/viewfile/vk-blank-user-profile.png') }}" alt="">
                <div class="detail-post-text-group">
                    <h2 class="detail-post-title">Gedung Polibatam</h2>
                    <p class="detail-post-user">Polibatam.Id</p>
                    <!-- <span class="post-category"><small>Photography</small></span>
                                    <p class="post-short-desc">Short Description about post</p> -->
                </div>

                <div class="detail-post-like-group">
                    <img src="{{ asset('htmlimg/viewfile/vk-like-btn-2.png') }}" alt="">
                    <p class="detail-post-like-list">Disukai 121</p>
                </div>

                <p class="detail-post-body">Ini adalah gedung polibatam yang bernama Gedung Utama yang menjadi salah satu
                    icon polibatam. Gedung ini sudah berdiri sejak awal didirikannya polibatam.</p>
            </div>

            </div>

            <div class="detail-post-more-by">
                <h1 class="detail-post-more-by-user">More by Polibatam.Id</h1>
                <div class="detail-post-card-2">
                    <div class="detail-post-image">
                        <span class="detail-category-tag">Category</span>
                        <img class="detail-post-like" src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}"
                            alt="">
                        <button class="btn-like">View More</button>
                        <button class="btn-like-2">Like</button>
                    </div>
                    <div class="detail-post-image">
                        <span class="detail-category-tag">Category</span>
                        <img class="detail-post-like" src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}"
                            alt="">
                        <button class="btn-like">View More</button>
                        <button class="btn-like-2">Like</button>
                    </div>
                    <div class="detail-post-image">
                        <span class="detail-category-tag">Category</span>
                        <img class="detail-post-like" src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}"
                            alt="">
                        <button class="btn-like">View More</button>
                        <button class="btn-like-2">Like</button>
                    </div>
                    <div class="detail-post-image">
                        <span class="detail-category-tag">Category</span>
                        <img class="detail-post-like" src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}"
                            alt="">
                        <button class="btn-like">View More</button>
                        <button class="btn-like-2">Like</button>
                    </div>
                </div>
            </div>

        </section>
    @endsection
</body>

</html>
