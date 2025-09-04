<html>

<head>
    <title>Vokatif</title>
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/auth/login.css') }}">
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
                <img class="form-logo-2" src="{{ asset('htmlimg/viewfile/vk-logo-2d.png') }}" alt="">
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- <form method="POST" action=""> -->
                <h2 style="border-top: 1px solid #333;">LOGIN</h2>
                <!-- @csrf -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" placeholder="Email"
                        class="input-1 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email' || 'username') }}" required autocomplete="email" autofocus>
                    <!-- @error('email')
        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
    @enderror -->
                </div>



                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="input-1 @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">



                    @error('email')
                        <!-- <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span> -->
                        @php
                            toastr()->error($message);
                        @endphp
                    @enderror

                </div>

                <div class="forgot-password">
                    <input type="checkbox" id="remember" name="remember" class="input-2"
                        {{ old('remember') ? 'checked' : '' }}>
                    <p id="remember-me-1" class="remember-me-1">Remember Me</p>
                    <!-- <label class="form-check-label" for="remember">
                  {{ __('Remember Me') }} -->

                </div>


                <div class="form-group">
                    <button class="login-btn" id="loginbtn" type="submit">Login</button>
                </div>

                <div class="sign-up">
                    <span>Don't have an account?</span>
                    <a href="/register">Sign up</a>
                </div>

            </form>
        </div>
    @endsection
</body>


<!-- <script>
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
</script> -->


</html>
