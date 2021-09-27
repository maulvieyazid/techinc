@extends('layouts.front.techinc', ['navbar' => 'registrasi'])

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
                <h1 class="text-white m-0 judul">Registration</h1>
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
                    <h2 class="judul teks-merah" style="font-size: 2.2rem;">{{ $registrasi->judul }}</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-5 col-10">
                <div id="eventCarousel" class="carousel slide mb-4" data-ride="carousel" data-interval="3000">
                    <div class="carousel-inner">
                        @foreach ($registrasi->file_photo() as $foto)
                            <div class="carousel-item @if ($loop->first) active @endif">
                                <img src="{{ asset($foto) }}" class="d-block w-100">
                            </div>
                        @endforeach
                        @if (count($registrasi->file_photo()) == 0)
                            <div class="carousel-item active">
                                <img src="{{ asset('images/no-photos.webp') }}" class="d-block w-100">
                            </div>
                        @endif
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
                    @if ($registrasi->tanggal_mulai->toDateString() == $registrasi->tanggal_selesai->toDateString())
                        {{ $registrasi->tanggal_selesai->translatedFormat('d F Y') }}
                    @else
                        {{ $registrasi->tanggal_mulai->translatedFormat('d F') }} -
                        {{ $registrasi->tanggal_selesai->translatedFormat('d F Y') }}
                    @endif
                </p>
                <h5>Status</h5>
                <h5>
                    @if ($registrasi->tanggal_mulai->lt(date('Y-m-d H:i:s')) && $registrasi->tanggal_selesai->gt(date('Y-m-d H:i:s')))
                        <span class="badge rounded-pill bg-success text-white">Buka</span>
                    @else
                        <span class="badge rounded-pill bg-danger text-white">Tutup</span>
                    @endif
                </h5>
                {{-- Jika ada link daftarnya dan registrasi nya blm selesai --}}
                @if ($registrasi->link_daftar && !$registrasi->tanggal_selesai->lt(date('Y-m-d H:i:s')))
                    <a href="{{ $registrasi->link_daftar }}" class="btn btn-danger my-3" target="_blank">DAFTAR</a>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-5 col-10">
                <div>
                    <textarea id="deskripsi">{!! $registrasi->deskripsi !!}</textarea>
                </div>
            </div>
        </div>
    </section>

@endsection


@push('js')
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>

    <script>

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
