@extends('layouts.front.techinc', ['navbar' => 'home'])

@push('styles')
    <style>
        /* SEMUA VERSI / VERSI MOBILE */

        /* Style Carousel Header */
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
            border-radius: 50px;
            z-index: 3;
            margin-top: 10%;
        }

        .tenant-box h3 {
            color: white;
            font-size: 6.5vw;
            margin-bottom: 5%;
            font-weight: bold;
        }

        .tenant-slider .card {
            border-radius: 30px;
            height: 30rem;
        }

        .tenant-slider .card-header {
            position: relative;
            min-height: 30%;
            overflow: hidden;
            padding: 0;
            margin: 0;
        }

        .tenant-slider .card img {
            position: absolute;
            top: 50%;
            left: 50%;
            height: 45%;
            transform: translate(-50%, -50%);
        }

        .tenant-slider .card .card-body {
            overflow-y: auto;
        }

        .slick-dots li.slick-active button:before {
            color: white !important;
        }

        .slick-dots li button:before {
            color: white !important;
        }

        /* Akhir Style Carousel Tenant */

        /* Style News */
        .news-container {
            background-image: url("{{ asset('images/bg-news-grey.svg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            margin-top: 30%
        }

        .news-slider {
            margin-top: -13%;
        }

        .news-slider .card {
            border: none;
            border-radius: 50px;
            background-color: rgba(109, 109, 109, 0.5);
            color: white;
            margin: 15px;
        }

        .news-slider .card .card-body {
            margin-bottom: 25px;
        }

        .news-slider .card img {
            padding: 1.25rem;
            padding-top: 3rem;
        }

        .news-slider .card .card-title {
            font-weight: 700;
        }

        .news-slider .card .card-text {
            text-align: justify;
            font-size: 0.7rem;
        }

        .navigasi-news {
            height: 100px;
        }

        .navigasi-news .carousel-control-prev {
            left: auto;
        }

        .navigasi-news .carousel-control-next {
            right: auto;
        }

        .navigasi-news img {
            width: 5.5vmax;
        }

        /* Akhir Style News */

        /* Style Event */
        .judul-event h1 {
            font-size: 10vmax;
            font-weight: 800;
            color: #ED1C24
        }

        .judul-event h3 {
            font-weight: 800;
            font-size: 3vmax;
        }

        .event-slider {
            margin-top: -10%;
        }

        .event-slider .card {
            color: white;
            background: linear-gradient(to right, #313233, #59585A);
            border-radius: 0 0 50px 50px;
            margin: 15px;
        }

        .event-slider .card .card-body {
            padding-left: 20px;
        }

        .event-slider .card-title {
            font-weight: bold;
            margin-bottom: 30px
        }

        .event-slider .card ul {
            list-style-type: none;
            padding: 0;
        }

        .event-slider .card ul img {
            width: 3vmax;
            display: inline-block;
        }

        .event-container {
            background-image: url("{{ asset('images/bg-event-grey.svg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            margin-top: 12%;
        }

        /* Akhir Style Event */

        /* Style Partner */
        .partner-container div h1 {
            font-size: calc(1rem + 2vmax);
        }

        .padding-besar {
            padding: 35px 15px 35px 25px !important;
        }

        .logo-partner div img {
            width: 100%;
        }

        /* Akhir Style Partner */

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

        /* VERSI DESKTOP */
        @media (min-width: 992px) {

            /* Style Carousel Header Desktop */

            .call-to-action .btn-action {
                font-size: 1.5vmax;
                width: 8vmax;
            }

            /* Akhir Style Carousel Header Desktop */

            /* Style Carousel Tenant Desktop */
            .tenant-box {
                border-radius: 80px;
                padding-bottom: 20px;
                margin-top: -6%;
            }

            .tenant-box h3 {
                font-size: 4vw;
            }

            .tenant-slider .card img {
                height: 70%;
            }

            /* Akhir Style Carousel Tenant Desktop */

            /* Style News Desktop */
            .news-container {
                margin-top: 20%
            }

            .navigasi-news .carousel-control-prev {
                left: auto;
                right: 0;
            }

            .navigasi-news .carousel-control-next {
                right: auto;
                left: 0;
            }

            .navigasi-news img {
                width: 6.5vmin;
            }

            /* Akhir Style News Desktop */

            /* Style Event Desktop */
            .event-slider .card-title {
                font-size: 3.2vmin;
            }

            .event-slider .card ul img {
                width: 4vmin;
            }

            .event-slider .card {
                border-radius: 0 0 100px 100px;
                margin: 15px;
            }

            .event-slider .card .card-body {
                padding-left: 35px;
                padding-bottom: 50px;
            }

            /* Akhir Style Event Desktop */

            /* Style Partner Desktop */
            .partner-container div h1 {
                font-size: calc(1rem + 3vmax);
            }

            .padding-besar {
                padding: 60px 25px 60px 35px !important;
            }

            /* Akhir Style Partner Desktop */
        }

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

    </style>
@endpush

@section('content')
    {{-- Carousel --}}
    <section id="carouselHeader" class="carousel slide carousel-fade carousel-header" data-ride="carousel">
        <div class="carousel-inner">
            <div class="call-to-action">
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
    </section>
    {{-- Akhir Carousel --}}

    {{-- Tenant Startup --}}
    <section id="tenant" class="container-fluid">
        <div class="row">
            <div class="col-1 d-flex align-items-end">
                <div class="d-none d-sm-none d-md-none d-lg-block d-xl-block">
                    <img src="{{ asset('images/bunga-tenant-kiri.svg') }}" style="width: 100%; margin-bottom: -100%;">
                </div>
            </div>
            <div class="col-10">
                <div class="card text-center tenant-box">
                    <div class="card-body">
                        <h3>Tenant Startup</h3>
                        <div class="row">
                            <div
                                class="col-lg-1 d-none d-sm-none d-md-none d-lg-flex d-xl-flex align-items-center justify-content-center">
                                <div class="tenant-prev-arrow">
                                    <img src="{{ asset('images/chevron-left-circle.svg') }}" width="80%">
                                </div>
                            </div>
                            <div class="col-lg-10 col-12">
                                <div class="tenant-slider">
                                    @foreach ($allStartup as $startup)
                                        <div>
                                            <div class="card text-justify mx-2">
                                                <div class="card-header">
                                                    <img src="{{ asset($startup->logo) }}">
                                                </div>
                                                <div class="card-body">
                                                    {{ $startup->deskripsi }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @if ($allStartup->isEmpty())
                                    <h3>Belum ada Startup</h3>
                                @endif
                            </div>
                            <div
                                class="col-lg-1 d-none d-sm-none d-md-none d-lg-flex d-xl-flex align-items-center justify-content-center">
                                <div class="tenant-next-arrow">
                                    <img src="{{ asset('images/chevron-right-circle.svg') }}" width="80%">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </section>
    {{-- Akhir Tenant Startup --}}

    {{-- News --}}
    <section id="news" class="container-fluid news-container pb-5">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-9 col-10">
                <div class="news-slider">
                    @foreach ($allNews as $news)
                        <div>
                            <div class="card">
                                {{-- <a href="{{ route('detail.news', $news->slug) }}" class="stretched-link"></a> --}}
                                <img src="{{ asset($news->thumbnail) }}" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-subtitle text-right">{{ $news->created_at->format('j.m.Y') }}
                                    </h6>
                                    <h5 class="card-title">{{ $news->judul }}</h5>
                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($news->deskripsi), 180, $end = '...') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($allNews->isEmpty())
                    <h3 class="text-center font-weight-bold" style="font-size: 2rem">Belum ada News</h3>
                @endif
            </div>
            <div class="col-lg-2 col-2 pr-0">
                <img src="{{ asset('images/tag-news.svg') }}" alt="News" style="width: 100%; margin-top: -110%;">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-lg-5 col-3 d-flex justify-content-end align-items-center">
                <div class="news-prev-arrow">
                    <img src="{{ asset('images/chevron-left-circle.svg') }}" width="60%">
                </div>
            </div>
            <div class="col-lg-1 col-4 d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-danger">Selengkapnya</button>
            </div>
            <div class="col-lg-6 col-3 d-flex justify-content-start align-items-center">
                <div class="news-next-arrow text-right">
                    <img src="{{ asset('images/chevron-right-circle.svg') }}" width="60%">
                </div>
            </div>
        </div>


    </section>
    {{-- Akhir News --}}

    {{-- Judul Event --}}
    <section id="judulEvent" class="container-fluid position-relative" style="margin-top: 4%">
        <div class="row">
            <div class="col-2 d-flex align-items-end">
                <div class=" d-none d-sm-none d-md-none d-lg-block d-xl-block pl-3">
                    <img src="{{ asset('images/bunga-event-kiri.svg') }}" style="width: 80%; margin-bottom: -83%;">
                </div>
            </div>
            <div class="col">
                <div class="judul-event pl-lg-3">
                    <div class="row">
                        <div class="col">
                            <h1>Event</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute d-none d-sm-none d-md-none d-lg-block d-xl-block" style="bottom: 0; right: 0">
            <img src="{{ asset('images/bunga-event-kanan.svg') }}" style="width: 11vmax;">
        </div>
    </section>
    {{-- Akhir Judul Event --}}

    {{-- Event --}}
    <section id="event" class="container-fluid event-container pb-5">
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-8 col-10">
                <div class="event-slider">
                    @foreach ($allEvent as $event)
                        <div>
                            <div class="card">
                                <img src="{{ asset($event->file_photo()[0]) }}" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-subtitle">{{ $event->tanggal_mulai->format('j.m.Y') }}</h6>
                                    <h5 class="card-title">{{ $event->nama_event }}</h5>
                                    <ul>
                                        <li><img src="{{ asset('images/bell.png') }}">
                                            {{ $event->tanggal_mulai->format('H.i') }}-{{ $event->tanggal_selesai->format('H.i') }}
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><img src="{{ asset('images/location.png') }}"> online</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                @if ($allEvent->isEmpty())
                    <h3 class="text-center font-weight-bold" style="font-size: 2rem">Belum ada Event</h3>
                @endif
            </div>
            <div class="col-lg-2 col-1"></div>
        </div>

        <div class="row mt-2">
            <div class="col-4 col-lg-5 d-flex justify-content-end align-items-center">
                <div class="event-prev-arrow">
                    <img src="{{ asset('images/chevron-left-circle-dark.svg') }}" width="70%">
                </div>
            </div>
            <div class="col-4 col-lg-2 d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-danger">Selengkapnya</button>
            </div>
            <div class="col-4 col-lg-5 d-flex justify-content-start align-items-center">
                <div class="event-next-arrow text-right">
                    <img src="{{ asset('images/chevron-right-circle-dark.svg') }}" width="70%">
                </div>
            </div>
        </div>
    </section>
    {{-- Akhir Event --}}

    {{-- Partner --}}
    <section id="partner" class="container-fluid partner-container">
        <div class="row">
            <div class="col-6 text-white d-flex justify-content-center align-items-center padding-besar"
                style="background-color: #ED1C24">
                <h1 class="font-weight-bold">Partner</h1>
            </div>
            <div class="col-6 p-3 padding-besar">
                <div class="logo-partner">
                    @foreach ($allPartner as $partner)
                        <div>
                            <img src="{{ asset($partner->foto) }}" alt="{{ $partner->nama_partner }}"
                                style="width:90%">
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    {{-- Akhir Partner --}}

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.logo-partner').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                responsive: [{
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

            $('.event-slider').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 2000,
                prevArrow: $('.event-prev-arrow'),
                nextArrow: $('.event-next-arrow'),
                responsive: [{
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
            });

            $('.news-slider').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 2000,
                prevArrow: $('.news-prev-arrow'),
                nextArrow: $('.news-next-arrow'),
                responsive: [{
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }]
            });

            $('.tenant-slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 3000,
                prevArrow: $('.tenant-prev-arrow'),
                nextArrow: $('.tenant-next-arrow'),
                responsive: [{
                        breakpoint: 775,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            dots: true,
                        }
                    },
                    {
                        breakpoint: 1030,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                ]
            });
        });
    </script>
@endpush
