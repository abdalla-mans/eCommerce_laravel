<!DOCTYPE html>
<html>
{{-- test header --}}

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Boutique | Ecommerce bootstrap template')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nouislider/nouislider.min.css') }}">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/choices.js/public/assets/styles/choices.min.css') }}">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}">
    <!-- Google fonts-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('assets/css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
</head>

<body>
    <div class="page-holder">
        <!-- navbar-->
        <header class="header bg-white">
            <div class="container px-lg-3">
                <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand"
                        href="{{ asset('assets/index.html') }}"><span
                            class="fw-bold text-uppercase text-dark">Boutique</span></a>
                    <button class="navbar-toggler navbar-toggler-end" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link active" href="{{ asset('assets/index.html') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link" href="{{ asset('assets/shop.html') }}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <!-- Link--><a class="nav-link"
                                    href="{{ asset('assets/detail.html">Product ') }}">detail</a>
                            </li>
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown"
                                    href="{{ asset('assets/') }}" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Pages</a>
                                <div class="dropdown-menu mt-3 shadow-sm" aria-labelledby="pagesDropdown"><a
                                        class="dropdown-item border-0 transition-link"
                                        href="{{ asset('assets/index.html') }}">Homepage</a><a
                                        class="dropdown-item border-0 transition-link"
                                        href="{{ asset('assets/shop.html') }}">Category</a><a
                                        class="dropdown-item border-0 transition-link"
                                        href="{{ asset('assets/detail.html') }}">Product detail</a><a
                                        class="dropdown-item border-0 transition-link"
                                        href="{{ asset('assets/cart.html') }}">Shopping cart</a><a
                                        class="dropdown-item border-0 transition-link"
                                        href="{{ asset('assets/checkout.html') }}">Checkout</a></div>
                            </li>
                        </ul>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link" href="{{ asset('assets/cart.html') }}"> <i
                                        class="fas fa-dolly-flatbed me-1 text-gray"></i>Cart<small
                                        class="text-gray fw-normal">(2)</small></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ asset('assets/') }}"> <i
                                        class="far fa-heart me-1"></i><small class="text-gray fw-normal">
                                        (0)</small></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ asset('assets/') }}"> <i
                                        class="fas fa-user me-1 text-gray fw-normal"></i>Login</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
