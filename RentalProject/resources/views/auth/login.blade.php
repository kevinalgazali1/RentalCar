@extends('layouts.app')

@section('content')
<style>
body {
    background-color: #776B5D;
    font-family: 'Assistant', sans-serif;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    color: white; /* Teks warna putih untuk meningkatkan kontras */
}

.card {
    background-color: #282828; /* Warna latar belakang card */
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
    width: 400px;
    padding: 20px;
    animation: fadeInUp 0.5s ease-out;
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
    color: white; /* Teks warna putih */
}

.form-control {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    box-sizing: border-box;
    border: 1px solid #555; /* Warna border yang lebih gelap */
    border-radius: 5px;
    font-size: 1em;
    transition: border-color 0.3s ease-out;
    background-color: #333; /* Warna latar belakang form yang lebih gelap */
    color: white; /* Teks warna putih */
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

.btn-login {
    background-color: rgb(58, 58, 58);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 1em;
    transition: background-color 0.3s ease-out;
}

.btn-login:hover {
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

</style>

<div class="card">
    <div class="card-header">Form Login</div>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <label for="password" class="form-label">{{ __('Password') }}</label>
            <div class="d-flex">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                <button type="button" class="toggle-password" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </button>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <div class="d-flex justify-content-between mt-3">
                <button type="submit" class="btn-login">{{ __('Login') }}</button>
                <a class="btn-link" href="{{ route('register') }}">{{ __('Sign Up?') }}</a>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById("togglePassword").addEventListener("click", function () {
        togglePassword("password");
    });

    function togglePassword(inputId) {
        var passwordInput = document.getElementById(inputId);
        passwordInput.type = passwordInput.type === "password" ? "text" : "password";
    }
</script>
@endsection
