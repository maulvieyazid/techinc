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

        .news-card .card {
            border: none;
            border-radius: 50px;
            background-color: rgba(109, 109, 109, 0.5);
            color: white;
            margin: 15px;
            transition: .3s;
        }

        .news-card .card .card-body {
            margin-bottom: 25px;
        }

        .news-card .card img {
            padding: 1.25rem;
            padding-top: 3rem;
            height: 250px;
            object-fit: cover;
        }

        .news-card .card .card-title {
            font-weight: 700;
        }

        .news-card .card .card-text {
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

        /* ========== Event Card ===================== */
        .event-card {
            border: 4px solid #EB242C;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            background-color: transparent;
            border-radius: 50px;
            margin-bottom: 15px;
        }

        .event-card .card-img-top {
            padding: 2rem;
            padding-top: 3rem;
        }

        .event-card .card-body {
            padding-left: 30px;
        }

        .event-card .card-title {
            font-weight: bold;
            margin-bottom: 30px
        }

        .event-card ul {
            list-style-type: none;
            padding: 0;
        }

        .event-card ul img {
            width: 3vmax;
            display: inline-block;
        }

        /* ========== Event Card ===================== */

        /* Akhir Style Event */

        /* Style Gallery */

        .gallery-container {
            background: linear-gradient(to right, #313233, #59585A);
        }

        .bg-merah {
            background-color: #ED1C24
        }

        .judul {
            font-weight: 800;
            font-size: 7vmax;
        }

        .bunga-gallery {
            width: 100%
        }

        /* Akhir Style Gallery */

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

            /* ============= Event Card Desktop ========= */

            .event-card ul img {
                width: 3.4vmin;
            }

            .event-card .card-body {
                padding-left: 35px;
                padding-bottom: 50px;
            }

            /* ============= Event Card Desktop ========= */

            /* Akhir Style Event Desktop */

            /* Style Gallery Desktop */
            .bunga-gallery {
                width: 25%
            }

            /* Akhir Style Gallery Desktop */

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
                <a href="https://bit.ly/TenantStartup" target="_blank" class="btn btn-danger btn-action">Mau</a>
                <a href="{{ route('program') }}" class="btn btn-danger btn-action">Pelajari</a>
            </div>
            @foreach ($allCarouselImage as $carouselImage)
                <div class="carousel-item @if ($loop->first) active @endif">
                    <img src="{{ asset($carouselImage->foto) }}" class="d-block">
                </div>
            @endforeach
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
                                                    <a href="{{ route('detail.startup', $startup->slug) }}">
                                                        <img src="{{ asset($startup->logo) }}">
                                                    </a>
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
    <section id="news" class="container-fluid news-container position-relative pb-5">
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-9 col-10">
                <div class="row row-cols-lg-2 row-cols-1" style="margin-top: -15%">
                    @foreach ($allNews as $news)
                        <div class="col news-card my-3">
                            <div class="card h-100">
                                <a href="{{ route('detail.news', $news->slug) }}" class="stretched-link"></a>
                                <img src="{{ asset($news->thumbnail) }}" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-subtitle text-right">{{ $news->created_at->format('j.m.Y') }}
                                    </h6>
                                    <h5 class="card-title">{{ $news->judul }}</h5>
                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($news->deskripsi), 140, $end = '...') }}
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
                <img src="{{ asset('images/tag-news.svg') }}" alt="News" style="width: 100%; margin-top: -90%;">
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-lg-5 col-3"></div>
            <div class="col-lg-1 col-4 d-flex justify-content-center align-items-center">
                <a href="{{ route('all.news') }}" class="btn btn-danger">Selengkapnya</a>
            </div>
            <div class="col-lg-6 col-3"></div>
        </div>
        <div class="position-absolute d-none d-sm-none d-md-none d-lg-block d-xl-block" style="top: 77%; right: 0">
            <img src="{{ asset('images/bunga-event-kanan.svg') }}" style="width: 10vmax;">
        </div>
    </section>
    {{-- Akhir News --}}

    {{-- Event --}}
    <section id="event" class="container-fluid pb-5">
        <div class="row">
            <div class="col-2 d-flex align-items-end">
                {{-- <div class=" d-none d-sm-none d-md-none d-lg-block d-xl-block pl-3">
                    <img src="{{ asset('images/bunga-event-kiri.svg') }}" style="width: 80%; margin-bottom: -83%;">
                </div> --}}
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
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-8 col-10">
                <div class="row row-cols-lg-2 row-cols-1">
                    @foreach ($allEvent as $event)
                        <div class="col my-3">
                            <div class="card event-card h-100">
                                <a href="{{ route('detail.event', $event->slug) }}" class="stretched-link"></a>
                                <img src="{{ asset($event->file_photo()[0] ?? 'images/no-photos.webp') }}" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-subtitle text-right">{{ $event->tanggal_mulai->format('d.m.Y') }}
                                    </h6>
                                    <h5 class="card-title">{{ $event->nama_event }}</h5>
                                    <ul>
                                        <li><img src="{{ asset('images/bell-dark.png') }}">
                                            {{ $event->tanggal_mulai->format('H.i') }}-{{ $event->tanggal_selesai->format('H.i') }}
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            {{-- <img src="https://img.icons8.com/ios/100/000000/door.png" /> --}}
                                            <img src="{{ asset('images/door-icon-10414.png') }}" />
                                            {{-- Jika Tanggal Mulai (>) sekarang --}}
                                            @if ($event->tanggal_mulai->gt(date('Y-m-d H:i:s')))
                                                <span class="badge bg-primary text-white align-middle">Akan Datang</span>
                                                {{-- Jika Tanggal Mulai (<) sekarang && Tanggal Selesai (>) sekarang --}}
                                            @elseif ($event->tanggal_mulai->lt(date('Y-m-d H:i:s')) &&
                                                $event->tanggal_selesai->gt(date('Y-m-d
                                                H:i:s')) )
                                                <span class="badge bg-warning text-dark align-middle">Sedang
                                                    Berlangsung</span>
                                                {{-- Jika Tanggal Selesai (<) sekarang --}}
                                            @elseif ($event->tanggal_selesai->lt(date('Y-m-d H:i:s')) )
                                                <span class="badge bg-success text-white align-middle">Selesai</span>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($allEvent->isEmpty())
                        <div class="col-12 col-lg-6">
                            <div class="card event-card">
                                <img src="{{ asset('images/no-event-img.png') }}" class="card-img-top">
                                <div class="card-body" style="height: auto!important;">
                                    <h5 class="card-title">Belum Ada Event</h5>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-4 col-lg-5"></div>
            <div class="col-4 col-lg-2 d-flex justify-content-center align-items-center">
                <a href="{{ route('all.event') }}" class="btn btn-danger">Selengkapnya</a>
            </div>
            <div class="col-4 col-lg-5"></div>
        </div>

    </section>
    {{-- Akhir Event --}}

    {{-- Gallery --}}
    <section id="gallery" class="container-fluid gallery-container pb-5">
        <div class="row pt-5 mb-5">
            <div class="col-lg-2"></div>
            <div class="col-lg-5 col-4 d-flex justify-content-end align-items-center">
                <img src="{{ asset('images/kiri-gallery.png') }}" class="bunga-gallery">
            </div>
            <div class="col-lg-5 col-8 bg-merah d-flex align-items-center">
                <h1 class="judul text-white">Gallery</h1>
            </div>
        </div>
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 mx-3">
            @foreach ($allKategori as $kategori)
                <div class="col my-3">
                    <div class="card bg-dark text-white gallery-item" style="height: 300px;">
                        <a href="{{ route('detail.galeri', $kategori->slug) }}" class="stretched-link"></a>
                        <img src="{{ asset($kategori->file_photo()[0] ?? 'images/no-photos.webp') }}"
                            class="card-img"
                            style="filter: brightness(50%);width: 100%;height: 100%;object-fit: cover;">
                        <div class="card-img-overlay d-flex justify-content-center align-items-center">
                            <h5 class="card-title text-center">{{ $kategori->nama_kategori }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-4 col-lg-5"></div>
            <div class="col-4 col-lg-2 d-flex justify-content-center align-items-center">
                <a href="{{ route('all.galeri') }}" class="btn btn-danger">Selengkapnya</a>
            </div>
            <div class="col-4 col-lg-5"></div>
        </div>
    </section>
    {{-- Akhir Gallery --}}

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
