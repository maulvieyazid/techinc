@extends('layouts.front.techinc', ['navbar' => 'document'])

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

        ol li {
            margin: 15px 0;
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
                <h1 class="text-white m-0 judul">Dokumen</h1>
            </div>
        </div>
    </header>

    <section id="content" class="container-fluid pb-5" style="margin-top: -200px;">
        <div class="row">
            <div class="col-xl-1 col-lg-2 col-md-1"></div>
            <div class="col-lg-7 col-md-10 col-12">
                <ol>
                    @foreach ($allDocument as $document)
                        <li>
                            <a href="{{ route('document.download.file', $document->id_document) }}">
                                {{ $document->nama_document }}
                            </a>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

@endsection

@push('js')

@endpush
