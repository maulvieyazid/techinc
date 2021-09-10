@extends('layouts.front.techinc', ['navbar' => 'program'])

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

        .lingkaran-merah {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 4px solid #ED1C24;
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        .tahap {
            display: inline-block;
            font-weight: 800;
            font-size: 2rem;
        }

        .deskripsi {
            padding: 10px 0 100px 23px;
            text-align: justify;
            margin-left: 7px;
            border-left: 4px solid black;
            width: 90%;
            font-size: large;
        }

        /*  Akhir Utilities */

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

        /* VERSI DESKTOP */

        @media (min-width: 992px) {

            /* Utilities Desktop */

            .lingkaran-merah {
                width: 30px;
                height: 30px;
                border: 6px solid #ED1C24;
                margin-right: 1rem;
            }

            .tahap {
                font-size: 4rem;
            }

            .deskripsi {
                padding-left: 39px;
                text-align: justify;
                margin-left: 12px;
                width: 85%;
                font-size: larger;
            }

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
                <h1 class="text-white m-0 judul">Program</h1>
            </div>
        </div>
    </header>

    <section id="content" class="container-fluid " style="margin-top: -200px;">
        <div class="row">
            <div class="col-lg-1 col-md-1"></div>
            <div class="col-lg-8 col-md-10 col-12">
                @foreach ($semuaProgram as $program)
                    <div class="lingkaran-merah"></div>
                    <div class="tahap">{{ $program->tahap }}</div>
                    <div class="deskripsi" @if ($loop->last) style="border-color: transparent;" @endif>{{ $program->deskripsi }}</div>
                @endforeach
            </div>
        </div>
    </section>


@endsection


@push('js')

@endpush
