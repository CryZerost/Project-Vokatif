<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vokatif</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">

    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('cssfile/layout/layout.css') }}">

    <!-- extras framework ui -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- font import-->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
        rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
        crossorigin="anonymous">
    -->


</head>

<body>

    <div class="layout-container" id="barList">
        <div class="layout-navbar">
            <a href="{{ route('home') }}"> <img class="layout-navbar-1"
                    src="{{ asset('htmlimg/viewfile/vk-logo-3.png') }}" alt="" class="logo-vk-3"></a>
            <nav>
                <ul id="menuList">
                    <li><a href="{{ route('posts.news') }}">News</a></li>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('show.category') }}">Categories</a></li>
                    @if (Auth::check() && Auth::user()->role === 'admin')
                        <li class="dropdown">
                            <a href="#">Admin <i class="bx bx-caret-down"></i></a>
                            <ul class="dropdown-menu">
                                <li class="admin-li"><a href="{{ route('posts.index') }}">Post Settings</a></li>
                                <li class="admin-li"><a href="{{ route('categories.index') }}">Category Settings</a></li>
                                <li class="admin-li"><a href="{{ route('admin.index') }}">User Settings</a></li>
                            </ul>
                        </li>
                    @endif
                    @if (Auth::check() && Auth::user()->role === 'admin')
                    <li><a class="admin-res" href="{{ route('admin.index') }}">Admin</a></li>
                    @endif
                </ul>
            </nav>
            <ul class="profile-navbar">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item-profile">
                            <a class="nav-link-profile" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item-profile">
                            <a class="nav-link-profile" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item-user">
                        <a href="{{ route('browse.index') }}"> <img src="{{ asset('htmlimg/viewfile/vk-search-3.png') }}"
                                alt="" class="search-vk-1"></a>
                        <a style="font-weight: bold;" id="navbarDropdown" class="nav-link-user" href="{{ route('index') }}"
                            role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <!-- {{ Str::words(Auth::user()->name, 2) }}--> {{Auth::user()->username}}
                        </a>

                        <div class="nav-logout-dropdown">
                            <a href="{{ route('index') }}" class="nav-logout-btn">Profile</a>
                            <hr>
                            <a href="{{ route('posts.index') }}" class="nav-logout-btn">Create</a>
                            <hr>
                            @if (Auth::user()->role === 'admin')
                                <a href="{{ route('admin.index') }}" class="nav-logout-btn">Settings</a>
                                <hr>
                            @else
                                <a href="{{ route('user.update') }}" class="nav-logout-btn">Settings</a>
                                <hr>
                            @endif
                            <a class="nav-logout-btn" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <hr>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>

                    </li>
                @endguest
            </ul>

            <img style="cursor:pointer" src="{{ asset('htmlimg/viewfile/vk-menu-2.png') }}" alt=""
                class="menu-vk-1" onclick="togglemenu()">
            <!--  <img src="{{ asset('htmlimg/viewfile/vk-dots-1a.png') }}" class="dots-vk-1" alt="" onclick="toggledots()">  -->

        </div>




        <!-- <div class="header">
            <img src="{{ asset('htmlimg/viewfile/vk-header.png') }}" alt="" class="header-vk-1">
        </div> -->

    </div>

    <script>
        /*
                                                                                                                                                                            var menuList = document.getElementById("menuList");
                                                                                                                                                                            var barList = document.getElementById("barList");
                                                                                                                                                                            

                                                                                                                                                                            barList.style.height = "10vh"
                                                                                                                                                                            menuList.style.maxHeight = "0px";

                                                                                                                                                                            
                                                                                                                                                                            function togglemenu(){
                                                                                                                                                                                if(menuList.style.maxHeight == "0px")
                                                                                                                                                                                {
                                                                                                                                                                                    menuList.style.maxHeight = "130px";
                                                                                                                                                                                }
                                                                                                                                                                                else
                                                                                                                                                                                {
                                                                                                                                                                                    menuList.style.maxHeight = "0px";
                                                                                                                                                                                };

                                                                                                                                                                                if(barList.style.height == "10vh")
                                                                                                                                                                                {
                                                                                                                                                                                    barList.style.height = "23vh";
                                                                                                                                                                                }
                                                                                                                                                                                else
                                                                                                                                                                                {
                                                                                                                                                                                    barList.style.height = "10vh";
                                                                                                                                                                                };
                                                                                                                                                                            }
                                                                                                                                                                        */
    </script>

    <script src="{{ asset('jsfile/layout.js') }}"></script>



    <section>
        @yield('isi')
    </section>

</body>

</html>
