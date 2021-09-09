@extends('layouts.front.techinc', ['navbar' => 'startup'])

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


        /* Utilities */
        .judul {
            font-weight: 800;
            font-size: 7vmax;
        }

        .teks-merah {
            color: #ED1C24;
        }

        .avatar {
            width: 200px;
            height: 200px;
            margin: 8% auto;
            display: flex;
            justify-content: center;
            align-items: start;
            overflow: hidden;
        }



        /*  Akhir Utilities */

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

        /* VERSI DESKTOP */

        @media (min-width: 992px) {}

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
                <h1 class="text-white m-0 judul">Tenant Startup</h1>
            </div>
        </div>
    </header>

    <section id="content" class="container-fluid mb-5" style="margin-top: -200px;">
        <div class="row mb-3">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-6 col-9">
                <div>
                    <h2 class="judul teks-merah" style="font-size: 2.2rem;">{{ $startup->nama_startup }}</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-5 col-10">
                <img src="{{ asset($startup->logo) }}" alt="Logo {{ $startup->nama_startup }}" class="img-fluid mb-5">
                <h5 class="mb-3">Deskripsi</h5>
                <p class="text-justify">{{ $startup->deskripsi }}</p>
                <h5 class="mt-4">Anggota Tim</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-9 col-10">
                <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
                    @foreach ($timStartup as $tim)
                        <div class="col my-3">
                            <div class="card h-100" style="box-shadow: 10px 10px 6px 0px rgba(0,0,0,0.3);">
                                <div class="avatar">
                                    <img src="{{ asset($tim->foto) }}" class="card-img-top" alt="{{ $tim->nama }}">
                                </div>
                                <div class="card-body text-center pt-0">
                                    <h5 class="card-title">{{ $tim->nama }}</h5>
                                    <p class="card-text">{{ $tim->posisi }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

@endsection


@push('js')

@endpush
