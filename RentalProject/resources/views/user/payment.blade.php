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
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Pembayaran</h1>
            </div>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-1">

            @if (session()->has('message'))
                <div class="alert alert-{{ session()->get('alert-type') }} alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Formulir Pemesanan</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('payment.store', ['car_slug' => $car->slug]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <p class="card-text">Nama Mobil: {{ $car->nama_mobil }}</p>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama lengkap</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Isikan Nama lengkap" required />
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input type="number" name="nik" class="form-control" placeholder="Isikan NIK" required />
                                </div>
                                <div class="mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Booking</label>
                                    <input type="date" name="tanggal" class="form-control" placeholder="Isikan Tanggal Booking"
                                        required />
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_payment" class="form-label">Foto Pembayaran</label>
                                    <input type="file" class="form-control" name="gambar_payment" required />
                                </div>
                                <div class="mb-3">
                                    <label for="foto_ktp" class="form-label">Foto KTP</label>
                                    <input type="file" class="form-control" name="foto_ktp" required />
                                </div>
                                <div class="mb-3">
                                    <label for="driver" class="form-label">Sewa Driver</label>
                                    <select name="driver" class="form-control" required>
                                        <option value="0">Tidak</option>
                                        @foreach ($drivers as $driver)
                                            <option value="{{ $driver->id }}">{{ $driver->nama_driver }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 d-flex align-items-center justify-content-between">
                                    @if ($payment && $payment->status === 'menunggu')
                                        <button type="button" class="btn btn-primary" disabled>
                                            Sedang Diproses
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-primary">
                                            Bayar
                                        </button>
                                    @endif
                            <a class="btn btn-primary mt-auto" href="{{ route('user.index') }}">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
@endsection