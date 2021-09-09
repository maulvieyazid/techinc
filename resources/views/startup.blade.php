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

        .startup-row {
            padding: 0 3rem 3rem;
        }

        .startup-card {
            box-shadow: 10px 10px 6px 0px rgba(0,0,0,0.3);
        }

        /*  Akhir Utilities */

        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */
        /* ======================================================================================================================================================================================================== */

        /* VERSI DESKTOP */

        @media (min-width: 992px) {
            .startup-row {
                padding: 0 8rem 3rem;
            }
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
                <h1 class="text-white m-0 judul">Tenant Startup</h1>
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
        <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-md-2 row-cols-1 mt-3 startup-row">
            @foreach ($allStartup as $startup)
                <div class="col my-4 d-flex justify-content-center align-items-center">
                    <div class="card startup-card" style="width: 200px; height: 200px; padding: 2rem;">
                        <a href="{{ route('detail.startup', $startup->slug) }}" class="stretched-link"></a>
                        <img src="{{ asset($startup->logo) }}" style="width: 100%; height: 100%; object-fit: contain;">
                    </div>
                </div>
            @endforeach
        </div>
    </section>

@endsection


@push('js')

@endpush
