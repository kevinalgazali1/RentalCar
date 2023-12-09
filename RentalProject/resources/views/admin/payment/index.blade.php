@extends('layouts.admin')

<style>
    thead tr th {
        justify-content: center;
        align-items: center;
        text-align: center;
    }

    tbody tr td {
        justify-content: center;
        align-items: center;
        text-align: center;
    }
</style>

@section('content')
<style>
    .card {
        background-color: #282828;
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
        text-align: center; /* Menggunakan text-align: center untuk memusatkan teks */
        font-size: 1.5em;
    }

    .card-body {
        padding: 20px;
    }

    .form-label {
        font-size: 1.2em;
        margin-bottom: 5px;
        color: white;
    }

    .form-control {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #555;
        border-radius: 5px;
        font-size: 1em;
        transition: border-color 0.3s ease-out;
        background-color: #333;
        color: white;
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
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Pembayaran</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="align-middle">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Tanggal Pesan</th>
                            <th>Foto Pembayaran</th>
                            <th>Foto KTP</th>
                            <th>Mobil Dipesan</th>
                            <th>Nama Driver</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $payment->nama }}</td>
                                <td class="align-middle">{{ $payment->nik }}</td>
                                <td class="align-middle">{{ $payment->tanggal }}</td>
                                <td class="align-middle"><img src="{{ Storage::url($payment->gambar_payment) }}" alt="" width="200"></td>
                                <td class="align-middle"><img src="{{ Storage::url($payment->foto_ktp) }}" alt="" width="200"></td>
                                <td class="align-middle">{{ $payment->car->nama_mobil ?? '-' }}</td>
                                <td class="align-middle">{{ $payment->driver->nama_driver ?? '-' }}</td>
                                <td class="align-middle">
                                    @if ($payment->status !== 'disetujui' && $payment->status !== 'ditolak')
                                        <form action="{{ route('admin.payment.approve', $payment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm">
                                                Setujui
                                            </button>
                                        </form>
                                    
                                        <form action="{{ route('admin.payment.reject', $payment->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Tolak
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-sm btn-success" disabled>
                                            Setujui
                                        </button>
                                        <button class="btn btn-sm btn-danger" disabled>
                                            Tolak
                                        </button>
                                    @endif
                                    
                                    <form onclick="return confirm('Apakah anda yakin ingin menghapus payment ini?');" class="d-inline" action="{{ route('payments.destroy', $payment->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
