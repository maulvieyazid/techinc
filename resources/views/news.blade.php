@extends('layouts.front.techinc', ['navbar' => 'news'])

@push('styles')
    <style>
        /* SEMUA VERSI / VERSI MOBILE */

        /* Style About */

        header {
            background-image: url("{{ asset('images/bg-template-header.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        /* Akhir Style About */

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

        .news-card {
            border: none;
            border-radius: 50px;
            background: linear-gradient(to right, #313233, #59585A);
            color: white;
            /* margin: 15px; */
        }

        .news-card .card-body {
            margin-bottom: 25px;
        }

        .news-card img {
            padding: 1.25rem;
            padding-top: 3rem;
            height: 250px;
            object-fit: cover;
        }

        .news-card .card-title {
            font-weight: 700;
        }

        .news-card .card-text {
            text-align: justify;
            font-size: 0.7rem;
        }

        .list-group-item.active {
            background-color: #ED1C24;
            border-color: #ED1C24
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
    </header>

    <section class="container-fluid mb-5" style="margin-top: -200px;">
        <div class="row" style="padding-left: 40px">
            <div class="col-lg-3 col-xl-2 my-3">
                <h3 style="border-left: 3px solid #ED1C24; padding-left: 15px;">Kategori</h3>

                <div class="list-group list-group-flush mt-4">
                    <a href="{{ route('all.news') }}"
                        class="list-group-item list-group-item-action @if ($kategori == null) {{ 'active' }} @endif">Semua</a>
                    @foreach ($allKategori as $perKategori)
                        <a href="{{ route('all.news', ['kategori' => $perKategori->slug]) }}"
                            class="list-group-item list-group-item-action @if ($kategori == $perKategori->slug) {{ 'active' }} @endif">{{ $perKategori->nama_kategori }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-9 col-xl-10">
                <div class="row row-cols-xl-3 row-cols-lg-2 row-cols-1">
                    @foreach ($allNews as $news)
                        <div class="col my-3">
                            <div class="card news-card h-100">
                                <a href="{{ route('detail.news', $news->slug) }}" class="stretched-link"></a>
                                <img src="{{ asset($news->thumbnail) }}" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-subtitle text-right">{{ $news->created_at->format('d.m.Y') }}</h6>
                                    <h5 class="card-title mt-3">{{ $news->judul }}</h5>
                                    <p class="card-text">
                                        {{ substr(strip_tags($news->deskripsi), 0, 180) }} ...
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
            </div>
        </div>
        <div class="row" style="padding-left: 40px">
            <div class="col-lg-3 col-xl-2"></div>
            <div class="col-lg-9 col-xl-10">
                {{ $allNews->withQueryString()->links() }}
            </div>
        </div>
    </section>


@endsection


@push('js')

@endpush
