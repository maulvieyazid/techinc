@extends('layouts.front.techinc', ['navbar' => 'facilities'])

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



        /*  Akhir Utilities */

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

        /* VERSI DESKTOP */

        @media (min-width: 992px) {

            /* Utilities Desktop */



            /* Akhir Utilities Desktop */

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
                <h1 class="text-white m-0 judul">Facilities</h1>
            </div>
        </div>
    </header>

    <section id="content" class="container-fluid pb-5" style="margin-top: -200px;">
        <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-7 col-md-10 col-12">
                <div class="row row-cols-lg-3 row-cols-md-3 row-cols-2">
                    @foreach ($semuaFasilitas as $fasilitas)
                        <div class="col d-flex flex-column align-items-center my-3">
                            <img src="{{ $fasilitas->logo }}" alt="{{ $fasilitas->nama_fasilitas }}">
                            <p class="text-center">{{ $fasilitas->nama_fasilitas }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


@endsection


@push('js')

@endpush
