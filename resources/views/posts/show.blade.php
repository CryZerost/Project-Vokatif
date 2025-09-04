<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $post->title }}</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/posts/show.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>

    @extends('layouts.layout')
    @section('isi')
        <section class="detail-post-container">
            <div class="detail-post-card">
                <div class="slider-wrapper">
                    <!-- ... -->
                    <div class="slider">

                        @foreach ($post->images as $image)
                            <img id="{{ $image->id }}" src="{{ asset($image->path) }}" alt="Post Image">
                        @endforeach


                        <!--- old system --->
                        <!--  <div class="slider-nav">
                                                                                                                                                                                                                                                                                                                                                                                                                                            @foreach ($post->images as $image)
    <a href="#{{ $image->id }}"></a>
    @endforeach
                                                                                                                                                                                                                                                                                                                                                                                                                                        </div> -->

                    </div>
                    <button class="slider-arrow slider-prev"><i class="fas fa-chevron-left"></i></button>
                    <button class="slider-arrow slider-next"><i class="fas fa-chevron-right"></i></button>
                    <!-- ... -->
                </div>
            </div>

            <div class="detail-post-info">


                <div class="detail-post-text-group">
                    <div class="detail-post-main">
                        @if ($post->user->avatar)
                            <a href="{{ route('user.show', $post->user) }}" class="card-link detail-post-user">
                                <img class="post-like-b"
                                    src="/asset/user/{{ $post->user->email }}/profile/{{ $post->user->avatar }}"
                                    alt="User Avatar">
                            </a>
                        @else
                            <a href="{{ route('user.show', $post->user) }}" class="card-link detail-post-user">
                                <img class="post-like-b" src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}"
                                    alt="Dummy Avatar">
                            </a>
                        @endif

                        <a href="{{ route('user.show', $post->user) }}" class="card-link detail-post-user">
                            <p class="detail-post-username">{{ $post->user->username }}</p>
                        </a>

                        <div style="margin-top: 50px" class="detail-post-like-group">
                            @guest
                                <a href="{{ route('login') }}">
                                    <img class="like-button-2" src="{{ asset('htmlimg/viewfile/vk-like-btn-4.png') }}"
                                        alt="">
                                    <p class="detail-post-like-list">{{ $likeCount }} </p>
                                </a>
                            @else
                                <form action="{{ route('posts.like', $post) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <button type="submit" class="like-button">
                                        @if ($post->isLikedBy(auth()->user()))
                                            <img class="like-button-2" src="{{ asset('htmlimg/viewfile/vk-like-btn-4.png') }}"
                                                alt="">
                                        @else
                                            <img class="like-button-1" src="{{ asset('htmlimg/viewfile/vk-like-btn-3.png') }}"
                                                alt=""
                                                onmouseover="this.src='{{ asset('htmlimg/viewfile/vk-like-btn-4.png') }}'"
                                                onmouseout="this.src='{{ asset('htmlimg/viewfile/vk-like-btn-3.png') }}'">
                                        @endif
                                    </button>
                                </form>
                        
                                <p class="detail-post-like-list">{{ $likeCount }}</p>
                           
                                @endif
                            </div>
                        </div>
                        <h2 class="detail-post-title">{{ $post->title }}</h2>
                        <h5 class="detail-post-title">{{ $post->category->name }}</h5>
                        <p class="detail-post-body" style="white-space: pre-line;">
                            @php
                                $limit = 256; // Set the character limit for the post body
                                $body = $post->body;
                                $bodyTrimmed = Str::limit($body, $limit);
                            @endphp
                            <span id="trimmedText">{{ $bodyTrimmed }}</span>
                            <span id="fullText" style="display: none;">{{ $body }}</span>
                            @if (strlen($body) > $limit)
                                <span id="showMoreText" class="show-more">... <a href="#"
                                        onclick="toggleShowMore(event)">Show More</a></span>
                            @endif
                        </p>

                        <div>
                            @if ($post->link)
                                <a href="{{ $post->link }}" class="detail-post-link">{{ $post->link }}</a>
                            @endif
                        </div>
                        <!-- <span class="post-category"><small>Photography</small></span> -->
                        <!-- <p class="post-short-desc">Short Description about post</p> -->
               
                        
                    </div>

                   
                </div>
                
                <div class="post-embed">

                    @if (!empty($post->demo))
                    <div class="youtube-demo-embed">
                        @php
                            // Extract the video ID from the YouTube URL
                            $video_id = '';
                            $parsed_url = parse_url($post->demo);
                            if ($parsed_url && isset($parsed_url['host'])) {
                                if ($parsed_url['host'] === 'www.youtube.com' || $parsed_url['host'] === 'youtube.com') {
                                    parse_str($parsed_url['query'], $video_params);
                                    if (isset($video_params['v'])) {
                                        $video_id = $video_params['v'];
                                    }
                                } elseif ($parsed_url['host'] === 'youtu.be') {
                                    $video_id = ltrim($parsed_url['path'], '/');
                                }
                            }
                        @endphp
                        <!-- Replace 'YOUTUBE_VIDEO_ID' with the actual YouTube video ID from the URL -->
                        <label class="embed-label" for="">Demo</label>
                        <!-- Example of a YouTube URL: https://www.youtube.com/watch?v=YOUTUBE_VIDEO_ID or https://youtu.be/YOUTUBE_VIDEO_ID -->
                        <!-- Replace 'YOUTUBE_VIDEO_ID' with the actual video ID -->
                        <iframe class="frame-embed" width="560" height="315" src="https://www.youtube.com/embed/{{ $video_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    @endif
                    
                    @if (!empty($post->teaser))
                    <div class="youtube-teaser-embed">
                        @php
                            // Extract the video ID from the YouTube URL
                            $video_id = '';
                            $parsed_url = parse_url($post->teaser);
                            if ($parsed_url && isset($parsed_url['host'])) {
                                if ($parsed_url['host'] === 'www.youtube.com' || $parsed_url['host'] === 'youtube.com') {
                                    parse_str($parsed_url['query'], $video_params);
                                    if (isset($video_params['v'])) {
                                        $video_id = $video_params['v'];
                                    }
                                } elseif ($parsed_url['host'] === 'youtu.be') {
                                    $video_id = ltrim($parsed_url['path'], '/');
                                }
                            }
                        @endphp
                        <!-- Replace 'YOUTUBE_VIDEO_ID' with the actual YouTube video ID from the URL -->
                        <label class="embed-label" for="">Teaser</label>
                        <!-- Example of a YouTube URL: https://www.youtube.com/watch?v=YOUTUBE_VIDEO_ID or https://youtu.be/YOUTUBE_VIDEO_ID -->
                        <!-- Replace 'YOUTUBE_VIDEO_ID' with the actual video ID -->
                        <iframe class="frame-embed" width="560" height="315" src="https://www.youtube.com/embed/{{ $video_id }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                    @endif
                </div>

                <section class="post-section">
                    <h2><a class="post-category-title" href="{{ route('user.show', $post->user) }}">More by {{$post->user->username}}</a></h2>
                    <div class="post-list" id="post-list">
                        <div class="post-container" id="list">
        
                            @forelse ($relatedPosts->sortByDesc('likes_count')->take(6) as $relatedPost)
                                <div class="post-card">
                                    <div class="post-image">
                                        <span class="category-tag">{{ $relatedPost->category->name }}</span>
                                        @if (!empty($relatedPost->thumbnail))
                                            <a href="{{ route('posts.show', $relatedPost->id) }}"><img class="post-like"
                                                src="{{ asset($relatedPost->thumbnail) }}" alt="Post Image"></a>
                                        @elseif (!empty($relatedPost->images) && $relatedPost->images->first())
                                        <a href="{{ route('posts.show', $relatedPost->id) }}"><img class="post-like"
                                            src="{{ asset($relatedPost->images->first()->path) }}" alt="Post Image"></a>
                                        @else
                                        <a href="{{ route('posts.show', $relatedPost->id) }}"><img class="post-like"
                                            src="{{ asset('htmlimg/viewfile/vk-blank-card.png') }}" alt="Post Image"></a>
                                        @endif
                                        <!-- <button class="btn-like-2">Total Vote : {{ $relatedPost->likes_count }}</button> -->
                                    </div>
        
                                    <div class="post-info">
                                      <!--  <img class="post-like-b" src="/asset/user/{{ $relatedPost->user->email }}/profile/{{ $relatedPost->user->avatar }}" alt=""> -->
                                        <div class="post-text-group">
                                            <h2 class="post-title">{{ $relatedPost->title }}</h2>
                                            <!-- <p class="post-user">{{ $relatedPost->user->username }}</p> -->
                                        </div>
                                    </div>
                                </div>
                                @empty
                           
                            @endforelse
                        </div>
                    </div>
                    <div class="direction">
        
                        <button class="btn-prev" id="next"> <img src="{{ asset('htmlimg/viewfile/vk-arrow-right-2.png') }}"
                                alt=""> </button>
                        <button class="btn-next" id="prev"><img src="{{ asset('htmlimg/viewfile/vk-arrow-right-2.png') }}"
                                alt=""> </button>
                    </div>
                </section>


                <div class="comment-section">
                    <h3>Comments</h3>
                    <form class="comment-form" action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            @auth
                            <label class="form-label" for="comment">Leave a comment:</label>
                            <textarea class="form-control" id="comment" name="content" rows="4"
                                placeholder="Type your comment here"></textarea>
                        </div>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <button type="submit" class="post-comment-button">Post Comment</button>
                        @else
                        <a href="{{ route('login') }}" class="post-warning"><label class="post-warning-li" class="form-label"
                                for="comment">Please login to leave a comment.</label></a>
                        @endauth
                    </form>
                    <div class="comment-list">
                        @foreach($post->comments as $comment)
                        <div class="comment">
                            <div class="user-profile">
                                @if ($comment->user->avatar)
                                <img class="profile-picture" src="/asset/user/{{ $comment->user->email }}/profile/{{ $comment->user->avatar }}"
                                    alt="User Profile Picture">
                                @else
                                <img class="profile-picture" src="{{ asset('htmlimg/viewfile/vk-profile-3.png') }}"
                                    alt="Dummy Avatar">
                                @endif
                                <p class="username">{{ $comment->user->username }}</p>
                            </div>
                            <p class="comment-text">{{ $comment->content }}</p>
                            <div class="comment-actions">
                                <!-- <button class="comment-action-btn reply-btn">Reply</button> -->
                                @auth
                                @if(auth()->user()->id === $comment->user_id || auth()->user()->role === 'admin')
                                <!-- <button class="comment-action-btn edit-btn">Edit</button> -->
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="comment-action-btn delete-btn">Delete</button>
                                </form>
                                @endif
                                @endauth
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
                
                
                
                
                </div>




        </section>

        
        <script src="{{ asset('jsfile/home.js') }}"></script>

        <script>
            const images = document.querySelectorAll('.slider img');
            const prevButton = document.querySelector('.slider-prev');
            const nextButton = document.querySelector('.slider-next');

            let currentIndex = 0;
            const minIndex = 0;
            const maxIndex = images.length - 1;

            function showImage(index) {
                images.forEach((image, i) => {
                    if (i === index) {
                        image.style.display = 'block';
                    } else {
                        image.style.display = 'none';
                    }
                });
            }

            function goToPrevImage() {
                currentIndex = currentIndex > minIndex ? currentIndex - 1 : maxIndex;
                showImage(currentIndex);
            }

            function goToNextImage() {
                currentIndex = currentIndex < maxIndex ? currentIndex + 1 : minIndex;
                showImage(currentIndex);
            }

            prevButton.addEventListener('click', goToPrevImage);
            nextButton.addEventListener('click', goToNextImage);
        </script>

        <script>
            function toggleShowMore(event) {
                event.preventDefault();
                const trimmedText = document.getElementById('trimmedText');
                const fullText = document.getElementById('fullText');
                const showMoreText = document.getElementById('showMoreText');

                if (trimmedText.style.display === 'none') {
                    trimmedText.style.display = 'inline';
                    fullText.style.display = 'none';
                    showMoreText.innerHTML = '... <a href="#" onclick="toggleShowMore(event)">Show More</a>';
                } else {
                    trimmedText.style.display = 'none';
                    fullText.style.display = 'inline';
                    showMoreText.innerHTML = '... <a href="#" onclick="toggleShowMore(event)">Show Less</a>';
                }
            }
        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    @endsection

</body>

</html>
