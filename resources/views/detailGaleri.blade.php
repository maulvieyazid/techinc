@extends('layouts.front.techinc', ['navbar' => 'news'])

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
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-6 col-9">
                <div>
                    <h2 class="judul teks-merah" style="font-size: 4vmax;">{{ $kategori->nama_kategori }}</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-9 col-9">
                <div class="card-columns spotlight-group">
                    @foreach ($allGaleri as $galeri)
                        <div class="card d-inline-block spotlight" data-src="{{ asset($galeri->file_galeri) }}"
                            @if ($galeri->tipe == '1') data-media="video" @endif>
                            @if ($galeri->tipe == '1')
                                <video controls src="{{ asset($galeri->file_galeri) }}" class="w-100"></video>
                            @elseif ($galeri->tipe == '2')
                                <img src="{{ asset($galeri->file_galeri) }}" class="card-img">
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>


@endsection


@push('js')

@endpush
