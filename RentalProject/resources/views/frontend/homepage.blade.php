@extends('layouts.frontend')
@section('content')
    <style>
        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            animation: scaleIn 0.5s ease-in-out;
            /* Animation definition */
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
            color: #ffffff;
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
                <h1 class="display-4 fw-bolder">Sistem Pemesanan Mobil</h1>
                <p class="lead fw-normal mb-0">
                    Mudah, Cepat, dan Terpercaya
                </p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            @if (count($cars) > 0)
                <h3 class="text-center mb-5" style="color: white">Daftar Mobil</h3>
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach ($cars->take(5) as $car)
                        <div class="col mb-5">
                            <div class="card h-100">
                                <!-- Sale badge-->
                                <div class="badge badge-custom {{ $car->status == 'tersedia' ? 'bg-success' : 'bg-warning' }} text-white position-absolute"
                                    style="top: 0; right: 0">
                                    {{ $car->status }}
                                </div>
                                <!-- Product image-->
                                <img class="card-img-top" src="{{ Storage::url($car->gambar) }}"
                                    alt="{{ $car->nama_mobil }}" width="200" height="200" />
                                <!-- Product details-->
                                <div class="card-body card-body-custom pt-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder">{{ $car->nama_mobil }}</h5>
                                        <!-- Product price-->
                                        <div class="rent-price mb-3" style="color: black">
                                            <span class="text-white">Rp
                                                {{ number_format($car->harga_sewa, 0, ',', '.') }}/</span>day
                                        </div>
                                        <ul class="list-unstyled list-style-group">
                                            <li class="border-bottom p-2 d-flex justify-content-between">
                                                <span>Bahan Bakar</span>
                                                <span style="font-weight: 600">{{ $car->bahan_bakar }}</span>
                                            </li>
                                            <li class="border-bottom p-2 d-flex justify-content-between">
                                                <span>Jumlah Kursi</span>
                                                <span style="font-weight: 600">{{ $car->jumlah_kursi }}</span>
                                            </li>
                                            <li class="border-bottom p-2 d-flex justify-content-between">
                                                <span>Transmisi</span>
                                                <span style="font-weight: 600">{{ $car->transmisi }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer border-top-0 bg-transparent">
                                    <div class="text-center">
                                        <a class="btn btn-primary mt-auto" href="{{ route('login') }}">Sewa</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center">
                    <p class="lead fw-normal text-white mt-5">Maaf, saat ini tidak ada mobil yang tersedia.</p>
                </div>
            @endif
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const buttons = document.querySelectorAll('.btn-primary');
    
            buttons.forEach(button => {
                button.addEventListener('click', function () {
                    const card = button.closest('.card');
                    card.classList.add('animate-exit');
    
                    setTimeout(() => {
                        // Tempatkan logika redirect atau apa yang Anda inginkan setelah animasi keluar di sini
                        window.location.href = button.getAttribute('href');
                    }, 500); // Sesuaikan dengan durasi animasi (0.5s)
                });
            });
        });
    </script>
@endsection
