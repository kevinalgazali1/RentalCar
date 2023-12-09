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

    <div class="card mt-5">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Daftar Driver</h3>
            <a href="{{ route('drivers.create') }}" class="btn btn-primary">Tambah Driver</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="align-middle">
                        <tr>
                            <th>No</th>
                            <th>Nama Driver</th>
                            <th>Gambar Driver</th>
                            <th>Gambar SIM</th>
                            <th>Gender</th>
                            <th>Usia</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($drivers as $driver)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $driver->nama_driver }}</td>
                                <td class="align-middle">
                                    <img src="{{ Storage::url($driver->gambar_driver) }}" alt="" width="200">
                                </td>
                                <td class="align-middle">
                                    <img src="{{ Storage::url($driver->gambar_sim) }}" alt="" width="200">
                                </td>
                                <td class="align-middle">{{ $driver->gender }}</td>
                                <td class="align-middle">{{ $driver->usia }}</td>
                                <td class="align-middle">
                                    <a href="{{ route('drivers.edit', $driver->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form onclick="return confirm('Apakah anda yakin ingin menghapus data?');"
                                        class="d-inline" action="{{ route('drivers.destroy', $driver->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Data Kosong</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
