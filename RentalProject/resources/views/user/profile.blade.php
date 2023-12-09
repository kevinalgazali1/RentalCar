@extends('user.main')

@section('content')
<style>
    
    .card {
        background-color: #282828; /* Warna latar belakang card */
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.8);
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
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Profile</h2>
                <form action="{{ route('user.profile.update') }}" method="POST">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengubah password.</small>
                    </div>

                    <!-- Konfirmasi Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                    </div>

                    <!-- Tombol Simpan -->
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a class="btn btn-primary mt-auto" href="{{ route('user.index') }}">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
