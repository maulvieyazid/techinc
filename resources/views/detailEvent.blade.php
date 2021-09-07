@extends('layouts.front.techinc', ['navbar' => 'event'])

@push('styles')
    <style>
        /* SEMUA VERSI / VERSI MOBILE */

        /* Style  */

        header {
            background-image: url("{{ asset('images/bg-template-header.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        /* Akhir Style  */

        /* ========== Event Card ===================== */
        .event-card {
            border: 4px solid #EB242C;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            background-color: transparent;
            border-radius: 50px;
        }

        .event-card .card-img-top {
            padding: 2rem;
            padding-top: 3rem;
        }

        .event-card .card-body {
            padding-left: 20px;
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


        /* Utilities */
        .judul {
            font-weight: 800;
            font-size: 7vmax;
        }

        .isi {
            font-weight: 500;
            font-size: 1rem;
        }

        ol.isi li {
            margin: 20px 0;
        }

        .teks-merah {
            color: #ED1C24;
        }

        .bg-merah {
            background-color: #ED1C24
        }


        /*  Akhir Utilities */

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

        /* VERSI DESKTOP */

        @media (min-width: 992px) {

            .isi {
                font-size: 1.5rem;
            }

            /* ============= Event Card Desktop ========= */
            .event-card .card-title {
                font-size: 3.2vmin;
            }

            .event-card ul img {
                width: 4vmin;
            }

            .event-card .card-body {
                padding-left: 35px;
                padding-bottom: 50px;
            }

            /* ============= Event Card Desktop ========= */

        }

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

    </style>
@endpush

@section('content')
    <header class="container-fluid vh-100">
        <div class="row align-items-end h-50">
            <div class="col-lg-2 col-1">
                <img src="{{ asset('images/kiri-template-header.svg') }}"
                    class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block">
            </div>
            <div class="col-lg-10 col-10">
                <h1 class="text-white m-0 judul">Event</h1>
            </div>
        </div>
        <div class="row align-items-end h-50">
            <div class="col-lg-2 col-1"></div>
            {{-- <div class="col-lg-6 col-9">
                <div>
                    <h2 class="judul teks-merah" style="font-size: 4vmax;">The Lean Startup</h2>
                </div>
            </div> --}}
        </div>
    </header>

    <section id="content" class="container-fluid mb-5" style="margin-top: -200px;">
        <div class="row mb-3">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-6 col-9">
                <div>
                    <h2 class="judul teks-merah" style="font-size: 2.2rem;">{{ $event->nama_event }}</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-5 col-10">
                <div id="eventCarousel" class="carousel slide mb-4" data-ride="carousel" data-interval="3000">
                    <div class="carousel-inner">
                        @foreach ($event->file_photo() as $foto)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ asset($foto) }}" class="d-block w-100">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#eventCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#eventCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <h5>Tanggal</h5>
                <p>
                    @if ($event->tanggal_mulai->toDateString() == $event->tanggal_selesai->toDateString())
                        {{ $event->tanggal_selesai->translatedFormat('d F Y') }}
                    @else
                        {{ $event->tanggal_mulai->translatedFormat('d') }} -
                        {{ $event->tanggal_selesai->translatedFormat('d F Y') }}
                    @endif
                </p>
                <h5>Pukul</h5>
                <p>{{ $event->tanggal_mulai->format('H.i') }}-{{ $event->tanggal_selesai->format('H.i') }}</p>
                <h5>Status</h5>
                <h5>
                {{-- Jika Tanggal Mulai (>) sekarang --}}
                @if ($event->tanggal_mulai->gt(date('Y-m-d H:i:s')))
                    <span class="badge bg-primary text-white">Akan Datang</span>
                    {{-- Jika Tanggal Mulai (<) sekarang && Tanggal Selesai (>) sekarang --}}
                @elseif ($event->tanggal_mulai->lt(date('Y-m-d H:i:s')) && $event->tanggal_selesai->gt(date('Y-m-d
                    H:i:s')) )
                    <span class="badge bg-warning text-dark">Sedang Berlangsung</span>
                    {{-- Jika Tanggal Selesai (<) sekarang --}}
                @elseif ($event->tanggal_selesai->lt(date('Y-m-d H:i:s')) )
                    <span class="badge bg-success text-white">Selesai</span>
                @endif
                </h5>
                @if ($event->link_daftar)
                    <a href="{{ $event->link_daftar }}" class="btn btn-danger mb-4" target="_blank">DAFTAR</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-5 col-10">
                <div>
                    <textarea id="deskripsi">{!! $event->deskripsi !!}</textarea>
                </div>
            </div>
        </div>
    </section>

    <section id="other" class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-6">
                <img src="{{ asset('images/kiri-detail-page.svg') }}" class="w-100">
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-2 col-1"></div>
            <div class="col">
                <h3 style="color: #ED1C24; font-weight: 800">Event Lainnya</h3>
            </div>
        </div>
        <div class="row">
            <div
                class="col-lg-2 col-1 d-none d-sm-none d-md-none d-lg-flex d-xl-flex align-items-center justify-content-end">
                <div class="event-prev-arrow text-right">
                    <img src="{{ asset('images/chevron-left-circle-dark.svg') }}" width="70%">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="event-slider">
                    @foreach ($otherEvent as $event)
                        <div>
                            <div class="card event-card">
                                <a href="{{ route('detail.event', $event->slug) }}" class="stretched-link"></a>
                                <img src="{{ asset($event->file_photo()[0]) }}" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-subtitle text-right">{{ $event->tanggal_mulai->format('j.m.Y') }}
                                    </h6>
                                    <h5 class="card-title">{{ $event->nama_event }}</h5>
                                    <ul>
                                        <li><img src="{{ asset('images/bell-dark.png') }}">
                                            {{ $event->tanggal_mulai->format('H.i') }}-{{ $event->tanggal_selesai->format('H.i') }}
                                        </li>
                                    </ul>
                                    <ul>
                                        <li><img src="{{ asset('images/location-dark.png') }}"> online</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-2 col-1 d-none d-sm-none d-md-none d-lg-flex d-xl-flex align-items-center">
                <div class="event-next-arrow">
                    <img src="{{ asset('images/chevron-right-circle-dark.svg') }}" width="70%">
                </div>
            </div>
        </div>
    </section>


@endsection


@push('js')
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function() {
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
                    breakpoint: 775,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                    }
                }]
            });
        });

        ClassicEditor
            .create(document.getElementById('deskripsi'), {
                toolbar: [],
            })
            .then(editor => {
                editor.isReadOnly = true;
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
