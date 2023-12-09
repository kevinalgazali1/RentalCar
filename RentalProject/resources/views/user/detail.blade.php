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
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder" style="color: black">Detail Mobil</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ Storage::url($car->gambar) }}" alt="{{ $car->nama_mobil }}" />
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div>
                                <!-- Product name-->
                                <h3 class="fw-bolder text-primary">Deskripsi</h3>
                                <p>
                                    {{ $car->deskripsi }}
                                </p>
                                <div class="mobil-info-list border-top pt-4">
                                    <ul class="list-unstyled">
                                        <li>
                                            @if ($car->p3k)
                                                <i class="ri-checkbox-circle-line"></i>
                                                <span>P3K</span>
                                            @else
                                            <i class="ri-close-circle-line text-secondary"></i>
                                                <span>P3K</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($car->charger)
                                                <i class="ri-checkbox-circle-line"></i>
                                                <span>CHARGER</span>
                                            @else
                                            <i class="ri-close-circle-line text-secondary"></i>
                                                <span>CHARGER</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($car->audio)
                                                <i class="ri-checkbox-circle-line"></i>
                                                <span>Audio</span>
                                            @else
                                            <i class="ri-close-circle-line text-secondary"></i>
                                                <span>Audio</span>
                                            @endif
                                        </li>
                                        <li>
                                            @if ($car->ac)
                                                <i class="ri-checkbox-circle-line"></i>
                                                <span>AC</span>
                                            @else
                                            <i class="ri-close-circle-line text-secondary"></i>
                                                <span>AC</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card">
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bolder">{{ $car->nama_mobil }}</h5>
                                    <div class="rent-price mb-3">
                                        <span style="font-size: 1rem" class="text-primary">Rp
                                            {{ number_format($car->harga_sewa, 0, ',', '.') }}/</span>day
                                    </div>
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
                                <div class="text-center">
                                    <a class="btn btn-primary mt-auto" href="{{ route('user.index') }}">Back</a>
                                    @if ($car->status == 'tersedia')
                                        <a class="btn btn-primary mt-auto" href="{{ route('payment', ['car_slug' => $car->slug]) }}">Sewa</a>
                                    @else
                                        <button class="btn btn-secondary mt-auto" disabled>Sewa</button>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
