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

    {{-- Custom Style --}}
    <style>
        /* SEMUA VERSI / VERSI MOBILE */

        /* Style Carousel Header */
        .navbar-brand img {
            width: 20vmin;
        }

        .navbar-nav .nav-link {
            margin-right: 50px;
        }

        .carousel-header .carousel-item img {
            width: 100vw;
            height: 90vh;
            object-fit: cover;
        }

        .call-to-action {
            position: absolute;
            top: 26%;
            left: 7%;
            z-index: 2;
        }

        /* .call-to-action h1 {
            font-size: 7vmax;
            font-weight: 200;
            color: white;
        }

        .call-to-action h1 span {
            font-size: 10vmax;
            font-weight: bold;
        } */

        .call-to-action img {
            width: 50vmax;
            display: block;
            margin-left: -5%;
        }

        .call-to-action .btn-action {
            font-size: 2.1vmax;
            width: 12vmax;
            margin-right: 2vmax;
            margin-top: -30%;
        }

        /* Akhir Style Carousel Header */



        /* Carousel Tenant */
        .tenant-box {
            background-color: #EB242C;
            border-radius: 80px;
            margin-top: -6%;
            z-index: 3;
            padding-bottom: 30px;
        }

        .tenant-box h3 {
            color: white;
            font-size: 4vmax;
            margin-top: 6%;
            margin-bottom: 5%;
            font-weight: bold;
        }

        .tenant-box .carousel-control-prev,
        .tenant-box .carousel-control-next {
            left: auto;
            right: auto;
        }

        .tenant-box .carousel-control-prev img,
        .tenant-box .carousel-control-next img {
            width: 5vmax;
        }


        .tenant-carousel .card {
            border-radius: 30px;
        }

        .tenant-carousel .carousel-item img {
            margin: auto;
            width: 15vmax;
        }

        .tenant-carousel .carousel-item .card-body {
            text-align: justify;
            height: 400px;
            overflow-y: auto;
        }

        /* Akhir Style Carousel Tenant */

        /* Style News */
        .news-container-fluid {
            background-image: url("{{ asset('images/bg-news-grey.svg') }}");
            background-size: cover;
            background-position-y: 20vmin;
            background-repeat: no-repeat;
            margin-top: 10%
        }

        .carousel-news .card {
            border: none;
            border-radius: 50px;
            background-color: rgba(109, 109, 109, 0.5);
            color: white;
            margin-bottom: 10px;
        }

        .carousel-news .card .card-body {
            margin-bottom: 25px;
        }

        .carousel-news .card img {
            padding: 1.25rem;
            padding-top: 3rem;
        }

        .carousel-news .card .card-text {
            text-align: justify;
        }

        .navigasi-news {
            height: 100px;
        }

        .navigasi-news .carousel-control-prev {
            left: auto;
            right: 20px;
        }

        .navigasi-news .carousel-control-next {
            right: auto;
            left: 20px;
        }

        .navigasi-news img {
            width: 6vmax;
        }

        /* Akhir Style News */

        /* Style Event */
        .judul-event h1 {
            font-size: 10vmax;
            font-weight: bold;
            color: #ED1C24
        }

        .judul-event h3 {
            font-weight: bold;
            font-size: 3vmax;
        }

        .carousel-event .carousel-item .card {
            color: white;
            background: linear-gradient(to right, #313233, #59585A);
            border-radius: 0 0 50px 50px;
            margin-bottom: 10px;
        }

        .carousel-event .carousel-item .card .card-body {
            padding-left: 30px;
        }

        .carousel-event .carousel-item .card-title {
            font-weight: bold;
            margin-bottom: 30px
        }

        .carousel-event .carousel-item .card ul {
            list-style-type: none;
            padding: 0;
        }

        .carousel-event .carousel-item .card ul img {
            width: 3vmax;
        }

        .event-container .carousel-control-prev img,
        .event-container .carousel-control-next img {
            width: 6vmax;
        }

        .event-container {
            background-image: url("{{ asset('images/bg-event-grey.svg') }}");
            background-size: cover;
            background-position-y: 20vmin;
            background-repeat: no-repeat;
            margin-top: 10%;
            padding-bottom: 10vmax
        }

        /* Akhir Style Event */

        /* VERSI DESKTOP */
        @media (min-width: 992px) {

            /* Style Carousel Header */
            .carousel-header {
                margin-top: -125px;
            }

            .navbar {
                z-index: 2;
                border-bottom: 2px solid white;
            }

            .navbar-nav .nav-link {
                color: white !important;
            }

            .btn-gabung {
                color: white;
                border-radius: 20px;
                border: 5px solid white;
                font-weight: bold;
            }

            /* .call-to-action h1 {
                font-size: 7vmax;
                color: white;
            }

            .call-to-action h1 span {
                font-size: 11vmax;
                font-weight: bold;
            } */

            .call-to-action .btn-action {
                font-size: 1.5vmax;
                width: 8vmax;
            }

            /* Akhir Style Carousel Header */

            /* Style Carousel Tenant */

            .tenant-carousel .carousel-item img {
                width: 15vmin;
            }

            .tenant-bunga-kiri {
                bottom: -7vmax;
            }

            .tenant-bunga-kiri img {
                width: 6vmax;
            }

            /* Akhir Style Carousel Tenant */

            /* Style News */
            .navigasi-news img {
                width: 8vmin;
            }

            /* Akhir Style News */

            /* Style Event */
            .carousel-event .carousel-item .card-title {
                font-size: 3.2vmin;
            }

            .event-container .carousel-control-prev img,
            .event-container .carousel-control-next img {
                width: 8vmin;
            }

            /* Akhir Style Event */
        }

    </style>

    <title>Tech.Inc</title>
</head>

<body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light mx-lg-5">
        {{-- Logo warna putih jika tampilan layar lebar --}}
        <a class="navbar-brand d-none d-sm-none d-md-none d-lg-block d-xl-block" href="#">
            <img src="{{ asset('images/logo-techinc-putih.png') }}" alt="Tech.Inc">
        </a>
        {{-- Logo warna hitam jika tampilan layar kecil --}}
        <a class="navbar-brand d-block d-sm-block d-md-block d-lg-none d-xl-none" href="#">
            <img src="{{ asset('images/logo-techinc-hitam.png') }}" alt="Tech.Inc">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav m-auto">
                <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="#">About Us</a>
                <a class="nav-link" href="#">Program & Facilities</a>
            </div>
            {{-- Button warna transparan jika tampilan layar lebar --}}
            <a class="nav-link btn btn-outline-light btn-gabung d-none d-sm-none d-md-none d-lg-block d-xl-block"
                href="#">GABUNG</a>
            {{-- Button warna gray jika tampilan layar kecil --}}
            <a class="nav-link btn btn-secondary btn-gabung d-block d-sm-block d-md-block d-lg-none d-xl-none mt-3"
                href="#">GABUNG</a>
        </div>
    </nav>
    {{-- Akhir Navbar --}}

    {{-- Carousel --}}
    <div id="carouselHeader" class="carousel slide carousel-fade carousel-header" data-ride="carousel">
        <div class="carousel-inner">
            <div class="call-to-action">
                {{-- <h1>Mau Buat <br><span>Startup ?</span></h1> --}}
                <img src="{{ asset('images/text-cta.png') }}" alt="Mau Buat Startup?">
                <button type="button" class="btn btn-danger btn-action">Mau</button>
                <button type="button" class="btn btn-danger btn-action">Pelajari</button>
            </div>
            <div class="carousel-item active">
                <img src="{{ asset('images/bg1.jpg') }}" class="d-block">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/bg-3.jpg') }}" class="d-block">
            </div>
        </div>

    </div>
    {{-- Akhir Carousel --}}

    {{-- Tenant Startup --}}
    <div class="container-fluid position-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-11">
                    <div class="card text-center tenant-box">
                        <div class="card-body">
                            <h3>Tenant Startup</h3>
                            <div class="row flex-nowrap">
                                <div class="col-1 d-flex align-items-center justify-content-center">
                                    {{-- Tampil di layar besar --}}
                                    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                                        <a class="carousel-control-prev" href="#carouselTenantBesar" role="button"
                                            data-slide="prev">
                                            <img src="{{ asset('images/chevron-left-circle.svg') }}">
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </div>
                                    {{-- Tampil di layar kecil --}}
                                    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
                                        <a class="carousel-control-prev" href="#carouselTenantKecil" role="button"
                                            data-slide="prev">
                                            <img src="{{ asset('images/chevron-left-circle.svg') }}">
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-10">
                                    {{-- Tampil di layar besar --}}
                                    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                                        <div id="carouselTenantBesar" class="carousel slide tenant-carousel"
                                            data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="card">
                                                                <img src="{{ asset('images/logo-startup.png') }}">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                                                    elit.
                                                                    Mollitia adipisci numquam minima consequuntur autem
                                                                    impedit
                                                                    voluptate alias, quidem quod, laboriosam dolorum,
                                                                    harum
                                                                    eaque nihil. Inventore aspernatur repudiandae
                                                                    debitis
                                                                    repellendus exercitationem.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="card">
                                                                <img src="{{ asset('images/logo-startup.png') }}">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit.
                                                                    Ullam maxime consequuntur deserunt consectetur
                                                                    veritatis
                                                                    quia molestiae quibusdam itaque libero ratione! Nisi
                                                                    molestiae deserunt expedita eius, quod eaque
                                                                    laudantium
                                                                    maxime ea quos totam excepturi eos ipsa quo earum
                                                                    soluta
                                                                    impedit quisquam maiores! Reprehenderit iusto sint
                                                                    quos
                                                                    numquam iure, ipsum nostrum autem harum, iste qui
                                                                    aliquid dignissimos quasi minima quis maxime ut
                                                                    eaque
                                                                    at? Sequi accusamus ad nostrum natus ex optio, non
                                                                    laboriosam doloremque unde corrupti ab ipsum culpa
                                                                    nulla
                                                                    perferendis voluptatum mollitia eum rem repellat
                                                                    architecto odio? Temporibus repellat vero laborum,
                                                                    aut
                                                                    minima, ad, quam praesentium vitae suscipit odit
                                                                    amet
                                                                    odio!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="card">
                                                                <img src="{{ asset('images/logo-startup.png') }}">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                                                    elit.
                                                                    Mollitia adipisci numquam minima consequuntur autem
                                                                    impedit
                                                                    voluptate alias, quidem quod, laboriosam dolorum,
                                                                    harum
                                                                    eaque nihil. Inventore aspernatur repudiandae
                                                                    debitis
                                                                    repellendus exercitationem.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <div class="card">
                                                                <img src="{{ asset('images/logo-startup.png') }}">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                                                    elit.
                                                                    Mollitia adipisci numquam minima consequuntur autem
                                                                    impedit
                                                                    voluptate alias, quidem quod, laboriosam dolorum,
                                                                    harum
                                                                    eaque nihil. Inventore aspernatur repudiandae
                                                                    debitis
                                                                    repellendus exercitationem.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="card">
                                                                <img src="{{ asset('images/logo-startup.png') }}">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor sit amet consectetur adipisicing
                                                                    elit.
                                                                    Ullam maxime consequuntur deserunt consectetur
                                                                    veritatis
                                                                    quia molestiae quibusdam itaque libero ratione! Nisi
                                                                    molestiae deserunt expedita eius, quod eaque
                                                                    laudantium
                                                                    maxime ea quos totam excepturi eos ipsa quo earum
                                                                    soluta
                                                                    impedit quisquam maiores! Reprehenderit iusto sint
                                                                    quos
                                                                    numquam iure, ipsum nostrum autem harum, iste qui
                                                                    aliquid dignissimos quasi minima quis maxime ut
                                                                    eaque
                                                                    at? Sequi accusamus ad nostrum natus ex optio, non
                                                                    laboriosam doloremque unde corrupti ab ipsum culpa
                                                                    nulla
                                                                    perferendis voluptatum mollitia eum rem repellat
                                                                    architecto odio? Temporibus repellat vero laborum,
                                                                    aut
                                                                    minima, ad, quam praesentium vitae suscipit odit
                                                                    amet
                                                                    odio!
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="card">
                                                                <img src="{{ asset('images/logo-startup.png') }}">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                                                    elit.
                                                                    Mollitia adipisci numquam minima consequuntur autem
                                                                    impedit
                                                                    voluptate alias, quidem quod, laboriosam dolorum,
                                                                    harum
                                                                    eaque nihil. Inventore aspernatur repudiandae
                                                                    debitis
                                                                    repellendus exercitationem.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Tampil di layar kecil --}}
                                    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
                                        <div id="carouselTenantKecil" class="carousel slide tenant-carousel"
                                            data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="carousel-item active">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="card">
                                                                <img src="{{ asset('images/logo-startup.png') }}">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                                                    elit.
                                                                    Mollitia adipisci numquam minima consequuntur autem
                                                                    impedit
                                                                    voluptate alias, quidem quod, laboriosam dolorum,
                                                                    harum
                                                                    eaque nihil. Inventore aspernatur repudiandae
                                                                    debitis
                                                                    repellendus exercitationem.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="card">
                                                                <img src="{{ asset('images/logo-startup.png') }}">
                                                                <div class="card-body">
                                                                    blablablablablablablabalbalbalablablablablablablablablablablabalbalbalablablablablablablablablablablabalbalbalablablablablablablablablablablabalbalbalablablablablablablablablablablabalbalbalablablablablablablablablablablabalbalbalablablablablablablablablablablabalbalbalablablablablablablablablablablabalbalbalablablabla
                                                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                                                    elit. Esse veritatis animi perspiciatis, ratione
                                                                    cum, id
                                                                    minus accusamus totam deleniti vitae voluptatum
                                                                    impedit
                                                                    quidem aliquid, perferendis velit? Laudantium magni
                                                                    ipsa
                                                                    incidunt est possimus quaerat, obcaecati corporis
                                                                    fugiat
                                                                    explicabo nam error minus iure neque repellendus id
                                                                    deserunt harum sed, et impedit ab. Ab quaerat
                                                                    officiis
                                                                    animi, rerum neque dignissimos quam, tempora ullam
                                                                    inventore asperiores ducimus cumque atque distinctio
                                                                    doloremque error nostrum consequuntur suscipit
                                                                    sapiente
                                                                    iure praesentium nemo numquam recusandae! Sequi illo
                                                                    cum
                                                                    laudantium molestiae perferendis exercitationem
                                                                    ipsam
                                                                    doloremque! Animi perferendis dolor fuga corrupti
                                                                    recusandae optio voluptates quam saepe, alias, nam
                                                                    enim
                                                                    dicta!
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="card">
                                                                <img src="{{ asset('images/logo-startup.png') }}">
                                                                <div class="card-body">
                                                                    Lorem ipsum dolor, sit amet consectetur adipisicing
                                                                    elit.
                                                                    Mollitia adipisci numquam minima consequuntur autem
                                                                    impedit
                                                                    voluptate alias, quidem quod, laboriosam dolorum,
                                                                    harum
                                                                    eaque nihil. Inventore aspernatur repudiandae
                                                                    debitis
                                                                    repellendus exercitationem.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-1 d-flex align-items-center justify-content-center">
                                    {{-- Tampil di layar besar --}}
                                    <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                                        <a class="carousel-control-next" href="#carouselTenantBesar" role="button"
                                            data-slide="next">
                                            <img src="{{ asset('images/chevron-right-circle.svg') }}">
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                    {{-- Tampil di layar kecil --}}
                                    <div class="d-block d-sm-block d-md-block d-lg-none d-xl-none">
                                        <a class="carousel-control-next" href="#carouselTenantKecil" role="button"
                                            data-slide="next" style="margin-left: -12px">
                                            <img src="{{ asset('images/chevron-right-circle.svg') }}">
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Bunga Kiri --}}
        <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block position-absolute tenant-bunga-kiri">
            <img src="{{ asset('images/bunga-tenant-kiri.svg') }}">
        </div>
    </div>
    {{-- Akhir Tenant Startup --}}

    {{-- News --}}
    <div class="container-fluid position-relative news-container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col" style="padding-top: 5%">
                    <div id="carouselNews" class="carousel slide carousel-news" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ asset('images/DMK02927 1.png') }}" class="card-img-top">
                                            <div class="card-body">
                                                <h6 class="card-subtitle text-right">19.07.2021</h6>
                                                <h5 class="card-title">Tech.Inc melakukan kerjasama dengan siapa?</h5>
                                                <p class="card-text">Lorem ipsum dolor sit, amet consectetur adipisicing
                                                    elit. Obcaecati voluptatum nam explicabo id nesciunt quis ad facilis
                                                    consectetur veritatis fugiat non in fugit corrupti sapiente
                                                    mollitia, recusandae ullam, ipsum aliquid.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ asset('images/DMK02927 1.png') }}" class="card-img-top">
                                            <div class="card-body">
                                                <h6 class="card-subtitle text-right">19.07.2021</h6>
                                                <h5 class="card-title">Tech.Inc melakukan kerjasama dengan siapa?</h5>
                                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing
                                                    elit. Odit, modi possimus ex labore eaque perferendis rerum iure.
                                                    Itaque nisi provident sed voluptatibus, laboriosam optio. Suscipit
                                                    dolores dicta iste placeat vitae.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ asset('images/DMK02927 1.png') }}" class="card-img-top">
                                            <div class="card-body">
                                                <h6 class="card-subtitle text-right">19.07.2021</h6>
                                                <h5 class="card-title">Tech.Inc melakukan kerjasama dengan
                                                    siapa?</h5>
                                                <p class="card-text">Some quick example text
                                                    to build on the
                                                    card title
                                                    and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card">
                                            <img src="{{ asset('images/DMK02927 1.png') }}" class="card-img-top">
                                            <div class="card-body">
                                                <h6 class="card-subtitle text-right">19.07.2021</h6>
                                                <h5 class="card-title">Tech.Inc melakukan kerjasama dengan
                                                    siapa?</h5>
                                                <p class="card-text">Some quick example text to build on the
                                                    card title
                                                    and make up the bulk of the card's content.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="position-absolute">
                        <img src="{{ asset('images/tag-news.svg') }}" alt="News" style="width: 130%">
                    </div>
                </div>
            </div>
            <div class="row navigasi-news">
                <div class="col-5 d-flex justify-content-center">
                    <a class="carousel-control-prev" href="#carouselNews" role="button" data-slide="prev">
                        <img src="{{ asset('images/chevron-left-circle.svg') }}">
                        <span class="sr-only">Previous</span>
                    </a>
                </div>
                <div class="col-5">
                    <a class="carousel-control-next" href="#carouselNews" role="button" data-slide="next">
                        <img src="{{ asset('images/chevron-right-circle.svg') }}">
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
    {{-- Akhir News --}}


    {{-- Judul Event --}}
    <div class="container-fluid position-relative" style="margin-top: 4%">
        <div class="row">
            <div class="col-2 d-flex align-items-end">
                <div class=" d-none d-sm-none d-md-none d-lg-block d-xl-block">
                    <img src="{{ asset('images/garis-merah-event.svg') }}" style="width: 17vmax;">
                </div>
            </div>
            <div class="col">
                <div class="container judul-event">
                    <div class="row">
                        <div class="col">
                            <h1>Event</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h3>Upcoming Event</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute d-none d-sm-none d-md-none d-lg-block d-xl-block" style="bottom: 0; right: 0">
            <img src="{{ asset('images/bunga-event-kanan.svg') }}" style="width: 11vmax;">
        </div>
    </div>
    {{-- Akhir Judul Event --}}

    {{-- Event --}}
    <div class="container-fluid event-container">
        <div class="row">
            <div class="col-2 d-flex justify-content-center">
                <a class="carousel-control-prev" href="#carouselEvent" role="button" data-slide="prev"
                    style="left: auto">
                    <img src="{{ asset('images/chevron-left-circle-dark.svg') }}">
                    <span class="sr-only">Previous</span>
                </a>
            </div>
            <div class="col">
                <div id="carouselEvent" class="carousel slide carousel-event" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ asset('images/Launching website museum.png') }}"
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h6 class="card-subtitle text-right">19.07.2021</h6>
                                            <h5 class="card-title">
                                                Enaknya ngadain apa?</h5>
                                            <ul>
                                                <li><img src="{{ asset('images/bell.png') }}"> 19.00-22.00</li>
                                            </ul>
                                            <ul>
                                                <li><img src="{{ asset('images/location.png') }}"> online</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ asset('images/Launching website museum.png') }}"
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h6 class="card-subtitle text-right">19.07.2021</h6>
                                            <h5 class="card-title">Enaknya ngadain apa?</h5>
                                            <ul>
                                                <li><img src="{{ asset('images/bell.png') }}"> 19.00-22.00</li>
                                            </ul>
                                            <ul>
                                                <li><img src="{{ asset('images/location.png') }}"> online</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ asset('images/Launching website museum.png') }}"
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h6 class="card-subtitle text-right">19.07.2021</h6>
                                            <h5 class="card-title">
                                                Enaknya ngadain apa?</h5>
                                            <ul>
                                                <li><img src="{{ asset('images/bell.png') }}"> 19.00-22.00</li>
                                            </ul>
                                            <ul>
                                                <li><img src="{{ asset('images/location.png') }}"> online</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ asset('images/Launching website museum.png') }}"
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h6 class="card-subtitle text-right">19.07.2021</h6>
                                            <h5 class="card-title">Enaknya ngadain apa?</h5>
                                            <ul>
                                                <li><img src="{{ asset('images/bell.png') }}"> 19.00-22.00</li>
                                            </ul>
                                            <ul>
                                                <li><img src="{{ asset('images/location.png') }}"> online</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2 d-flex justify-content-center">
                <a class="carousel-control-next" href="#carouselEvent" role="button" data-slide="next"
                    style="right: auto">
                    <img src="{{ asset('images/chevron-right-circle-dark.svg') }}">
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    {{-- Akhir Event --}}

    {{-- Contact Us --}}
    <div class="container-fluid" style="margin-top: 4%">
        <div class="container">
            <div class="row">
                <div class="col d-none d-sm-none d-md-none d-lg-block d-xl-block">
                    <div>
                        <img src="{{ asset('images/bunga-contact-kiri.svg') }}" style="width: 42%; margin-top: -10vmax">
                    </div>
                </div>
                <div class="col">
                    <h1 style="font-weight: bold;font-size: 5vmax;">Contact Us.</h1>
                    <div class="my-4">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.376441222648!2d112.78024511535587!3d-7.311538773919023!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7faec95555555%3A0xf13eec4465c5a263!2sUniversitas%20Dinamika%20(STIKOM%20Surabaya)!5e0!3m2!1sen!2sid!4v1628061506423!5m2!1sen!2sid"
                            width="150" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                            class="mr-2"></iframe>

                        <p style="display: inline-block; vertical-align: top;"><span style="font-weight: bold;">Alamat
                                :</span> <br>
                            Gedung Universitas Dinamika lt.1 <br>
                            Jl. Raya Kedung Baruk 98.</p>
                    </div>
                    <ul style="list-style-type: none; padding: 0" class="font-weight-bold">
                        <li>
                            <img src="{{ asset('images/instagram.svg') }}" alt="Instagram Tech.Inc" width="35px"
                                style="margin-right: 10px">tech.inc_dinamika
                        </li>
                        <li>
                            <img src="{{ asset('images/facebook.svg') }}" alt="Facebook Tech.Inc" width="35px"
                                style="margin-right: 10px">Tech.inc
                            Dinamika
                        </li>
                        <li>
                            <img src="{{ asset('images/youtube.svg') }}" alt="Youtube Tech.Inc" width="35px"
                                style="margin-right: 10px">Tech_inc
                            Dinamika
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
</body>

</html>
