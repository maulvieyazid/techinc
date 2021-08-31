@extends('layouts.front.techinc', ['navbar' => 'news'])

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

        .team-card {
            border: none;
            border-radius: 50px;
            background: linear-gradient(to right, #313233, #59585A);
            color: white;
        }

        .avatar {
            width: 200px;
            height: 200px;
            margin: 8% auto;
            display: flex;
            justify-content: center;
            align-items: end;
            overflow: hidden;
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
                <h1 class="text-white m-0 judul">News</h1>
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

    <section id="content" class="container-fluid mt-1">
        <div class="row" style="margin-top: -270px;">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-6 col-9 pr-0">
                <div>
                    <h2 class="judul teks-merah" style="font-size: 4vmax;">{{ $news->judul }}</h2>
                </div>
            </div>
        </div>
        <div class="row" style="margin-bottom: 100px">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-9 col-10 pr-0">
                <div>
                    <img src="{{ asset($news->thumbnail) }}" class="w-100">
                    <p>{{ $news->created_at->translatedFormat('l, d F Y') }}</p>
                    <textarea id="deskripsi">{!! $news->deskripsi !!}</textarea>
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
