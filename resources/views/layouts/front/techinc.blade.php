<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    {{-- Slick Slider --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/slick/slick-theme.css') }}">

    {{-- Custom Style --}}

    @stack('styles')

    <style>
        /* SEMUA VERSI / VERSI MOBILE */

        /* Style Navbar */
        .navbar {
            background-color: #EB242C;
        }

        .navbar-brand img {
            width: 20vmin;
        }

        .navbar-nav .nav-link {
            margin-right: 50px;
        }

        /* Akhir Style Navbar */


        /* Style Floating Sidebar */
        .floating-sidebar {
            position: fixed;
            left: 0;
            top: calc(50% / 2);
            z-index: 1030;
            margin-left: -3.7rem;
            transition: all .3s;
        }

        .floating-sidebar-expand {
            margin-left: 0;
        }

        .floating-menu {
            background-color: rgba(18, 18, 18, 0.5);
            padding: 15px;
            display: inline-block;
        }

        .floating-item img {
            width: 1.8rem;

        }

        .floating-sidebar-toggler {
            height: 7rem;
            position: absolute;
            top: calc(50% / 1.5);
            cursor: pointer;
        }

        /* Akhir Style Floating Sidebar */


        /* Style Contact Us */
        .contact-us-container {
            height: 100vh;
            background-image: url("{{ asset('images/bg-contact-us.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .contact-us-container .contact-us-col h3 {
            font-weight: bold;
            /* font-size: calc(1rem + 3.5vmax); */
            font-size: 2.5rem;
        }

        .contact-us-container .contact-us-col div p {
            display: inline-block;
            vertical-align: top;
        }

        /* Akhir Style Contact Us */

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

        /* VERSI DESKTOP */
        @media (min-width: 992px) {

            /* Style Navbar Desktop */

            .navbar-brand img {
                width: 15vmin;
            }

            .btn-gabung {
                color: white;
                border-radius: 20px;
                border: 5px solid white;
                font-weight: bold;
            }

            /* Akhir Style Navbar Desktop */

            /* Style Contact Us Desktop */
            .contact-us-container .contact-us-col h3 {
                font-weight: bold;
                /* font-size: calc(1rem + 3.5vmax); */
                font-size: 3.5rem;
            }

            /* Akhir Style Contact Us Desktop */

        }

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

    </style>

    <title>Tech.Inc</title>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark px-5">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/Logo Techinc Full Putih.png') }}" alt="Tech.Inc">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav m-auto font-weight-bold navbar-nav-scroll" style="max-height: 200px;">
                <a class="nav-link @if ($navbar == 'home') {{ 'active' }} @endif" href="{{ route('welcome') }}">Home</a>
                <a class="nav-link @if ($navbar == 'about') {{ 'active' }} @endif" href="{{ route('about') }}">About Us</a>
                <a class="nav-link @if ($navbar == 'program') {{ 'active' }} @endif" href="#">Program & Facilities</a>
                <a class="nav-link d-block d-sm-block d-md-block d-lg-none d-xl-none @if ($navbar == 'event') {{ 'active' }} @endif"
                    href="#">Event</a>
                <a class="nav-link d-block d-sm-block d-md-block d-lg-none d-xl-none @if ($navbar == 'announcement') {{ 'active' }} @endif"
                    href="#">Announcement</a>
                <a class="nav-link d-block d-sm-block d-md-block d-lg-none d-xl-none @if ($navbar == 'gallery') {{ 'active' }} @endif"
                    href="#">Gallery</a>
                <a class="nav-link d-block d-sm-block d-md-block d-lg-none d-xl-none @if ($navbar == 'tenant-startup') {{ 'active' }} @endif"
                    href="#">Tenant Startup</a>
                <a class="nav-link d-block d-sm-block d-md-block d-lg-none d-xl-none @if ($navbar == 'news') {{ 'active' }} @endif"
                    href="{{ route('all.news') }}">News</a>
                <a class="nav-link d-block d-sm-block d-md-block d-lg-none d-xl-none @if ($navbar == 'document') {{ 'active' }} @endif"
                    href="#">Document</a>
                <a class="nav-link d-block d-sm-block d-md-block d-lg-none d-xl-none @if ($navbar == 'contact-us') {{ 'active' }} @endif"
                    href="#">Contact Us</a>
            </div>
            <a class="nav-link btn btn-outline-light btn-gabung" href="#">GABUNG</a>
        </div>
    </nav>
    {{-- Akhir Navbar --}}

    {{-- Floating Sidebar --}}
    <div class="floating-sidebar d-none d-sm-none d-md-none d-lg-block d-xl-block">
        <div class="floating-menu">
            <a href="{{ route('welcome') }}" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right" title="Home">
                <img src="{{ asset('images/home-icon.png') }}">
            </a>
            <a href="{{ route('about') }}" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="About Us">
                <img src="{{ asset('images/about-icon.png') }}">
            </a>
            <a href="/about-us" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="Program & Facilities">
                <img src="{{ asset('images/program-facilities-icon.png') }}">
            </a>
            <a href="/about-us" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="Event">
                <img src="{{ asset('images/event-icon.png') }}">
            </a>
            <a href="/about-us" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="Announcement">
                <img src="{{ asset('images/announcement-icon.png') }}">
            </a>
            <a href="/about-us" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="Gallery">
                <img src="{{ asset('images/gallery-icon.png') }}">
            </a>
            <a href="/about-us" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="Tenant Startup">
                <img src="{{ asset('images/tenant-startup-icon.png') }}">
            </a>
            <a href="/about-us" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="Registration">
                <img src="{{ asset('images/registration-icon.png') }}">
            </a>
            <a href="{{ route('all.news') }}" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="News">
                <img src="{{ asset('images/news-icon.png') }}">
            </a>
            <a href="/about-us" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="Document">
                <img src="{{ asset('images/document-icon.png') }}">
            </a>
            <a href="/about-us" class="floating-item d-block my-2" data-toggle="tooltip" data-placement="right"
                title="Contact Us">
                <img src="{{ asset('images/contact-icon.png') }}">
            </a>
        </div>

        {{-- Btn Toggler --}}
        <img class="floating-sidebar-toggler" src="{{ asset('images/sidebar-collapsible-button.svg') }}">
        {{-- Akhir Btn Toggler --}}
    </div>
    {{-- Akhir Floating Sidebar --}}

    @yield('content')

    {{-- Contact Us --}}
    <div class="container-fluid contact-us-container">
        <div class="row h-100 pt-3">
            <div class="col-lg-6 d-flex justify-content-center align-items-center py-2">
                <img src="{{ asset('images/Logo Techinc Full Putih.png') }}" alt="Tech.Inc" style="max-width: 70%">
            </div>
            <div class="col-lg-6 contact-us-col text-white d-flex justify-content-center align-items-center py-2">
                <div>
                    <h3>Contact Us.</h3>
                    <div class="my-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.376441222648!2d112.78024511535587!3d-7.311538773919023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7faec95555555%3A0xf13eec4465c5a263!2sUniversitas%20Dinamika%20(STIKOM%20Surabaya)!5e0!3m2!1sen!2sid!4v1628061506423!5m2!1sen!2sid"
                            width="150" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                            class="mr-2"></iframe>
                        <p><span style="font-weight: bold;">Alamat
                                :</span> <br>
                            Gedung Universitas Dinamika lt.1 <br>
                            Jl. Raya Kedung Baruk 98.</p>
                    </div>
                    <p style="font-size: 1.5rem;" class="font-weight-bold">Stay Connected</p>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href=""><img src="{{ asset('images/red-email.svg') }}" alt="Email Tech.Inc"
                                    width="35px"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/tech.inc_dinamika"><img
                                    src="{{ asset('images/red-instagram.svg') }}" alt="Instagram Tech.Inc"
                                    width="35px"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href=""><img src="{{ asset('images/red-facebook.svg') }}" alt="Facebook Tech.Inc"
                                    width="35px"></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.youtube.com/channel/UCxFTCqnTaGkE5HQORTfvw3A"><img
                                    src="{{ asset('images/red-youtube.svg') }}" alt="Youtube Tech.Inc"
                                    width="35px"></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    {{-- Akhir Contact Us --}}


    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    {{-- Slick Slider JS --}}
    <script type="text/javascript" src="{{ asset('vendors/slick/slick.min.js') }}"></script>

    {{-- Custom Script --}}
    @stack('js')

    <script type="text/javascript">
        $(document).ready(function() {

            function btnGabungOnMobile() {
                if ($(window).width() < 992) {
                    $('.btn-gabung').removeClass('btn-outline-light');
                    $('.btn-gabung').addClass('btn-secondary mt-3');
                } else {
                    $('.btn-gabung').addClass('btn-outline-light');
                    $('.btn-gabung').removeClass('btn-secondary mt-3');
                }
            }
            // // Execute on first load
            btnGabungOnMobile();

            // Execute when resize
            window.onresize = btnGabungOnMobile;

            $('[data-toggle="tooltip"]').tooltip()

        });

        $(document).click(function(e) {
            // Jika diklik toggler sidebarnya, maka akan mentoggle class floating-sidebar-expand
            if ($(e.target).is('.floating-sidebar-toggler')) {
                $('.floating-sidebar').toggleClass('floating-sidebar-expand');
            }
            // Jika yang diklik elemen lain, maka akan langsung menghapus class floating-sidebar-expand
            else {
                $('.floating-sidebar').removeClass('floating-sidebar-expand');
            }
        });
    </script>
</body>

</html>
