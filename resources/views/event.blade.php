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
    </header>

    <section id="content" class="container-fluid ">
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-6 col-9">
                <div>
                    <h2 class="judul teks-merah" style="font-size: 4vmax;"></h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-1 mt-3 pb-4">
            @foreach ($allEvent as $event)
                <div class="col my-3">
                    <div class="card event-card h-100">
                        <a href="{{ route('detail.event', $event->slug) }}" class="stretched-link"></a>
                        <img src="{{ asset($event->file_photo()[0]) }}" class="card-img-top">
                        <div class="card-body">
                            <h6 class="card-subtitle text-right">{{ $event->tanggal_mulai->format('d.m.Y') }}</h6>
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
        <div class="row pb-4">
            <div class="col d-flex justify-content-center align-items-center">
                {{ $allEvent->links() }}
            </div>
        </div>
    </section>


@endsection


@push('js')

@endpush
