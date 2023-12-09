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
        border-radius: 0 0 8px 8px;
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
    <header class="">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center">
                    <h1 class="display-4 fw-bolder">Sistem Rental Mobil</h1>
                    <p class="lead fw-normal text-black-50 mb-0">
                        Mudah dan Terpercaya
                    </p>
                <form class="d-flex align-items-center mt-3" role="search" action="{{ route('user.search') }}" method="GET">
                    <input class="form-control me-3" type="search" name="search" placeholder="Search Product"
                        aria-label="Search">
                    <button class="btn me-5" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16" style="color: #fff">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg></button>
                </form>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
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
            <h3 class="text-center mb-5" style="color: white">Daftar Mobil</h3>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($cars as $car)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Sale badge-->
                            <div class="badge badge-custom {{ $car->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                                style="top: 0; right: 0">
                                {{ $car->status }}
                            </div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ Storage::url($car->gambar) }}" alt="{{ $car->nama_mobil }}"
                                width="200" height="200" />
                            <!-- Product details-->
                            <div class="card-body card-body-custom pt-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $car->nama_mobil }}</h5>
                                    <!-- Product price-->
                                    <div class="rent-price mb-3">
                                        <span class="text-primary">Rp
                                            {{ number_format($car->harga_sewa, 0, ',', '.') }}/</span>day
                                    </div>
                                    <ul class="list-unstyled list-style-group">
                                        <li class="border-bottom p-2 d-flex justify-content-between text-black">
                                            <span>Bahan Bakar</span>
                                            <span style="font-weight: 600">{{ $car->bahan_bakar }}</span>
                                        </li>
                                        <li class="border-bottom p-2 d-flex justify-content-between text-black">
                                            <span>Jumlah Kursi</span>
                                            <span style="font-weight: 600">{{ $car->jumlah_kursi }}</span>
                                        </li>
                                        <li class="border-bottom p-2 d-flex justify-content-between text-black">
                                            <span>Transmisi</span>
                                            <span style="font-weight: 600">{{ $car->transmisi }}</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer border-top-0 bg-transparent">
                                <div class="text-center">
                                    @if ($car->status == 'tersedia')
                                        <a class="btn btn-primary mt-auto" href="{{ route('payment', ['car_slug' => $car->slug]) }}">Sewa</a>
                                    @else
                                        <button class="btn btn-secondary mt-auto" disabled>Sewa</button>
                                    @endif
                                    <a class="btn btn-info mt-auto text-white" href="{{ route('user.detail', $car->slug) }}">Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
