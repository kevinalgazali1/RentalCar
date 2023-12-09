@extends('layouts.admin')

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
    <div class="card">
        <div class="card-header">
            Form Tambah Data Mobil
        </div>
        <div class="card-body">
            <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_mobil">Nama Mobil</label>
                    <input type="text" name="nama_mobil" class="form-control" value="{{ old('nama_mobil') }}">
                </div>
                <div class="form-group">
                    <label for="harga_sewa">Harga Sewa</label>
                    <input type="number" name="harga_sewa" class="form-control" value="{{ old('harga_sewa') }}">
                </div>
                <div class="form-group">
                    <label for="bahan_bakar">Bahan Bakar</label>
                    <input type="text" name="bahan_bakar" class="form-control" value="{{ old('bahan_bakar') }}">
                </div>
                <div class="form-group">
                    <label for="jumlah_kursi">Jumlah Kursi</label>
                    <input type="number" name="jumlah_kursi" class="form-control" value="{{ old('jumlah_kursi') }}">
                </div>
                <div class="form-group">
                    <label for="transmisi">Transmisi</label>
                    <select name="transmisi" id="transmisi" class="form-control">
                        <option value=""></option>
                        <option value="manual">Manual</option>
                        <option value="otomatis">Otomatis</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value=""></option>
                        <option value="tersedia">Tersedia</option>
                        <option value="tidak tersedia">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="5">{{ old('deskripsi') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="p3k">P3K</label>
                    <select name="p3k" id="p3k" class="form-control">
                        <option value=""></option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="charger">Charger</label>
                    <select name="charger" id="charger" class="form-control">
                        <option value=""></option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="audio">Audio</label>
                    <select name="audio" id="audio" class="form-control">
                        <option value=""></option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ac">AC</label>
                    <select name="ac" id="ac" class="form-control">
                        <option value=""></option>
                        <option value="1">Tersedia</option>
                        <option value="0">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar</label>
                    <input type="file" class="form-control" name="gambar">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('cars.index') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection