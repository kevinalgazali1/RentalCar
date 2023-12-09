@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #776B5D;
            font-family: 'Assistant', sans-serif;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: white;
        }

        .card {
            background-color: #282828;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
            width: 600px;
            margin-top: 180px;
            /* Menempatkan card di tengah window */
            animation: fadeInUp 0.5s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-header {
            background-color: rgb(58, 58, 58);
            color: white;
            border-radius: 15px 15px 0 0;
            padding: 10px;
            text-align: center;
            font-size: 1.5em;
        }

        .card-body {
            padding: 20px;
        }

        .form-label {
            font-size: 1.2em;
            margin-bottom: 5px;
            color: white;
            /* Teks warna putih */
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #555;
            /* Warna border yang lebih gelap */
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s ease-out;
            background-color: #333;
            /* Warna latar belakang form yang lebih gelap */
            color: white;
            /* Teks warna putih */
        }

        .form-control:focus {
            border-color: #007BFF;
        }

        .toggle-password {
            font-size: 0.8em;
            cursor: pointer;
            background: none;
            border: none;
            outline: none;
            color: #007BFF;
            transition: color 0.3s ease-out;
        }

        .toggle-password:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        .btn-primary {
            background-color: rgb(58, 58, 58);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s ease-out;
        }

        .btn-primary:hover {
            background-color: grey;

        }

        .btn-link {
            color: #007BFF;
            text-decoration: none;
            margin-left: 10px;
            transition: color 0.3s ease-out;
        }

        .btn-link:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        .fa-eye,
        .fa-eye-slash {
            font-size: 1em;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-end" style="color: white">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end" style="color: white">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end" style="color: white">{{ __('Password') }}</label>

                                <div class="col-md-6 d-flex">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    <!-- Tambahkan ikon mata untuk password -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="togglePassword"
                                            style="font-size:10px; margin-left:5px">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end" style="color: white">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6 d-flex">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <!-- Tambahkan ikon mata untuk password -->
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword"
                                            style="font-size:10px; margin-left:5px">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                    <a class="btn-link" href="{{ route('login') }}">{{ __('Sign In') }}</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Toggle untuk menampilkan/menyembunyikan password
        document.getElementById("togglePassword").addEventListener("click", function() {
            togglePassword("password");
            toggleEyeIcon("togglePassword");
        });

        // Toggle untuk menampilkan/menyembunyikan konfirmasi password
        document.getElementById("toggleConfirmPassword").addEventListener("click", function() {
            togglePassword("password-confirm");
            toggleEyeIcon("toggleConfirmPassword");
        });

        function togglePassword(inputId) {
            var passwordInput = document.getElementById(inputId);
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }

        function toggleEyeIcon(buttonId) {
            var eyeIcon = document.querySelector("#" + buttonId + " i");
            eyeIcon.classList.toggle("fa-eye-slash");
        }
    </script>
@endsection
