<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>VinRent</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" />

    <style>
        body {
            /* background-image: url('/img/bg.jpg'); */
            background-color: #776B5D;
            background-size: cover;
            /* agar background mencakup seluruh layar */
            background-attachment: fixed;
            /* agar background tetap saat menggulir */
        }

        .navbar {
            transition: background-color 0.3s ease-in-out;
            background-color: rgba(255, 255, 255, 0.01);
        }

        .navbar-brand,
        .navbar-nav a {
            color: #D3E0EA !important; /* Change the navbar text color */
        }

        .navbar-toggler-icon {
            background-color: #D3E0EA; /* Change the navbar toggler icon color */
        }

        .navbar-toggler {
            border-color: #D3E0EA; /* Change the navbar toggler border color */
        }

        .dropdown-menu {
            background-color: #1E2A2D; /* Change the dropdown menu background color */
        }

        .dropdown-item {
            color: #D3E0EA !important; /* Change the dropdown item text color */
        }

        .dropdown-divider {
            border-color: #D3E0EA; /* Change the dropdown divider color */
        }

        .footer {
            background-color: #1E2A2D; /* Change the footer background color */
            color: #D3E0EA; /* Change the footer text color */
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('user.index') }}" style="color: black">VinRent</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black">
                            {{ Auth::check() ? Auth::user()->name : 'Menu' }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user.index') }}">Home</a>
                            <a class="dropdown-item" href="{{ route('user.car') }}">Daftar Mobil</a>
                            <a class="dropdown-item" href="{{ route('user.driver') }}">Daftar Driver</a>
                            <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>

                            <div class="dropdown-divider"></div>
                            <a class="nav-link" onclick="document.getElementById('logout-form').submit()"
                                href="#">
                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                <span>Log Out</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header-->
    @yield('content')

    <!-- Footer-->
    <footer class="py-3 bg-dark position-fixed bottom-0 w-100 mt-5">
        <div class="container">
            <p class="m-0 text-center text-white">
                Copyright &copy; VinZli Website 2023
            </p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('frontend/js/scripts.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var navbar = document.querySelector(".navbar");

            window.addEventListener("scroll", function() {
                if (window.scrollY > 50) {
                    navbar.style.backgroundColor = "rgba(255, 255, 255, 0.5)";
                    /* Change the background color when scrolling down */
                } else {
                    navbar.style.backgroundColor = "rgba(255, 255, 255, 0.2)";
                    /* Restore the initial background color when scrolling up */
                }
            });
        });
    </script>
</body>

</html>
