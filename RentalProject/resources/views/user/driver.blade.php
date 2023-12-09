@extends('user.main')
@section('content')
<style>
    .card {
        background-color: #776B5D;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.5);
        transition: transform 0.3s;
        animation: scaleIn 0.5s ease-in-out;
        /* Animation definition */
        color: #000;
    }

    @keyframes scaleIn {
        from {
            transform: scale(0.5);
        }

        to {
            transform: scale(1);
        }
    }

    .card:hover {
        transform: scale(1.02);
    }

    .card-header {
        background-color: #3498db;
        color: #000 ;
        border-radius: 10px 10px 0 0;
        padding: 15px;
    }


    header {
        background-color: #7f8c8d;
        padding: 30px;
        border-bottom-right-radius: 100px;
        color: #000;
        text-align: center;
        animation: slideIn 1s ease-in-out;
        /* Animation definition */
    }

    @keyframes slideIn {
        from {
            opacity: -1;
            transform: translateX(-200px);
        }

        to {
            opacity: 2;
            transform: translateX(0);
        }
    }

    .badge-custom {
        border-radius:0 0 8px 8px;
        padding: 8px;
    }

    .rent-price {
        font-size: 1.2rem;
        color: #e74c3c;
    }

    .list-style-group li {
        font-size: 0.9rem;
        margin: 5px 0;
        padding: 5px 0;
        color: #7f8c8d;
    }

    .btn-primary {
        background-color: #e74c3c;
        border-color: #e74c3c;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #c0392b;
        border-color: #c0392b;
    }

    .animate-exit {
    animation: slideOut 0.5s ease-out;
    /* Animasi keluar */
}

@keyframes slideOut {
    from {
        opacity: 1;
        transform: translateY(0);
    }

    to {
        opacity: 0;
        transform: translateY(20px);
    }
}
</style>

    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="text-center mb-5" style="color: white">Daftar Driver</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($drivers as $driver)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Sale badge-->
                        <div class="badge badge-custom {{ $driver->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute" style="top: 0; right: 0">
                            {{ $driver->status }}
                        </div>
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ Storage::url($driver->gambar_driver) }}" alt="{{ $driver->nama_driver }}" width="200" height="200" />
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{ $driver->nama_driver }}</h5>
                                <!-- Product price-->
                                <ul class="list-unstyled list-style-group">
                                    <li class="border-bottom p-2 d-flex justify-content-between text-black">
                                        <span>Gender</span>
                                        <span style="font-weight: 600">{{ $driver->gender }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex justify-content-between text-black">
                                        <span>Usia</span>
                                        <span style="font-weight: 600">{{ $driver->usia }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
