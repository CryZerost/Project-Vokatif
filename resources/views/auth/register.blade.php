<html>

<head>
    <title>Vokatif</title>

    <!-- icon tab-->
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('cssfile/auth/register.css') }}">

    <meta name="viewport" content="width=device-width, initial- scale=1.0">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Arimo&amp;display=swap">
    <!-- Boostrrap CDN Link -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous"> -->
    <!-- Boostrap CDN Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous">
    </script>


</head>

<body>
    @extends('layouts.layout')
    @section('isi')
        <div class="form-form">
            <div class="form-logo">
                <img class="form-logo-1" src="{{ asset('htmlimg/viewfile/vk-logo-2d.png') }}" alt="">
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- <form method="POST" action=""> -->
                <h2 style="border-top: 1px solid #333;">SIGN UP</h2>
                <!-- @csrf -->

                <div class="form-input-2">
                    <div class="form-group-1">
                        <label for="name">Name</label>
                        <input id="name" type="text" placeholder="Name"
                            class="input-1 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                            required autocomplete="name" autofocus>

                        @error('name')
                            @php
                                toastr()->error($message);
                            @endphp
                        @enderror
                    </div>

                    <div class="form-group-2">
                        <label for="email">Email Adress</label>
                        <input id="email" placeholder="Email Adress" type="email"
                            class="input-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                            required autocomplete="email">

                        @error('email')
                            @php
                                toastr()->error($message);
                            @endphp
                        @enderror
                    </div>

                </div>

                <div class="form-input-2">
                    <div class="form-group-1">
                        <label for="Username">Username</label>
                        <input id="username" type="text" class="input-1" name="username" value="{{ old('username') }}"
                            placeholder="Username" required autocomplete="username">
                        @error('username')
                            @php
                                toastr()->error($message);
                            @endphp
                        @enderror
                    </div>

                    <div class="form-group-2">
                        <label for="prodi">Program</label>
                        <select class="input-3" id="prodi" name="prodi" required>
                            @foreach (['Teknik Informatika', 'Multimedia dan Jaringan', 'Animasi', 'Teknik Geomatika', 'TRPL'] as $prodi)
                                <option value="{{ $prodi }}">{{ $prodi }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>


                <div class="form-input-2">
                    <div class="form-group-1">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="input-1 @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                            @php
                                toastr()->error($message);
                            @endphp
                        @enderror



                    </div>


                    <div class="form-group-2">
                        <label for="password">Confirm Password</label>
                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="input-3"
                            name="password_confirmation" required autocomplete="new-password">

                        @error('confirmpassword')
                            @php
                                toastr()->error($message);
                            @endphp>
                        @enderror

                    </div>

                </div>

                <div class="forgot-password">
                    <span>Have an account?</span>
                    <a href="/login">Login</a>
                </div>

                <!-- <div class="forgot-password">
                                      <input type="checkbox" id="remember" name="remember" class="input-2" {{ old('remember') ? 'checked' : '' }}>
                                      <p id="remember-me-1" class="remember-me-1">Remember Me</p>
                                      <label class="form-check-label" for="remember">
                                      {{ __('Remember Me') }}
                                      
                                    </div> -->


                <div class="form-group">
                    <button type="submit">Sign Up</button>
                </div>



            </form>
        </div>
    @endsection
</body>


<script>
    function rememberMe() {
        // Get a reference to the checkbox and the username field
        var checkbox = document.getElementById("remember");
        var username = document.getElementById("email");

        // If the checkbox is checked, store the username in a cookie or local storage
        if (checkbox.checked) {
            localStorage.setItem("email", email.value);
        } else {
            localStorage.removeItem("email");
        }
    }

    window.onload = function() {
        // Get a reference to the checkbox and the username field
        var checkbox = document.getElementById("remember");
        var username = document.getElementById("email");

        // Check if the username is stored in local storage
        if (localStorage.getItem("username")) {
            // Set the username field to the stored value
            username.value = localStorage.getItem("email");
            // Check the remember checkbox
            checkbox.checked = true;
        }
    };
</script>


</html>
