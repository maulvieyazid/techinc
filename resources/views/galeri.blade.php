@extends('layouts.front.techinc', ['navbar' => 'gallery'])

@push('styles')
    <script src="{{ asset('vendors/spotlight/spotlight.bundle.js') }}"></script>

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

        .spotlight {
            cursor: pointer;
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
                <h1 class="text-white m-0 judul">Gallery</h1>
            </div>
        </div>
    </header>

    <section id="content" class="container-fluid " style="margin-top: -200px;">
        <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 mt-3 pb-5">
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
    </section>


@endsection


@push('js')

@endpush
