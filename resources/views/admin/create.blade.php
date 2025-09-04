<html>

<head>
    <title>Vokatif</title>

    <!-- icon tab-->
    <link rel="icon" href="{{ asset('htmlimg/viewfile/vk-icon.png') }}">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{ asset('cssfile/admin/create.css') }}">

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
            <!-- <div class="form-logo">
                    <img class="form-logo-1" src="{{ asset('htmlimg/viewfile/vk-logo-2d.png') }}" alt="">
                </div> -->



            <form method="POST" action="{{ route('admin.store') }}">
                @csrf
                <h2 style="border-top: 1px solid #333;">
                    Create User
                    <a href="{{ route('admin.index') }}" class="back-button">Back</a>
                </h2>

                <div class="form-input-2">
                    <div class="form-group-1">
                        <label for="name">Name</label>
                        <input id="name" type="text" placeholder="Name"
                            class="input-1 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                            required autofocus>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group-2">
                        <label for="email">Email Address</label>
                        <input id="email" placeholder="Email Address" type="email"
                            class="input-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-input-2">
                    <div class="form-group-1">
                        <label for="username">Username</label>
                        <input id="username" type="text" class="input-1 @error('username') is-invalid @enderror"
                            name="username" value="{{ old('username') }}" placeholder="Username" required>
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group-2">
                        <label for="prodi">Program Study</label>
                        <select class="input-3" id="prodi" name="prodi" required>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Multimedia dan Jaringan">Multimedia dan Jaringan</option>
                            <option value="Animasi">Animasi</option>
                            <option value="Teknik Geomatika">Teknik Geomatika</option>
                            <option value="TRPL">TRPL</option>
                        </select>
                    </div>
                </div>

                <div class="form-input-2">
                    <div class="form-group-1">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password"
                            class="input-1 @error('password') is-invalid @enderror" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group-2">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" placeholder="Confirm Password" type="password" class="input-3"
                            name="password_confirmation" required>
                    </div>
                </div>


                <div class="form-group">
                    <button type="submit">Create User</button>
                </div>
            </form>
        </div>
    @endsection

</body>

</html>
