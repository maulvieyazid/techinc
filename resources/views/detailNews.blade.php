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

        /* Style Other */
        .news-slider .card {
            border: none;
            border-radius: 50px;
            background-color: #6D6D6D;
            color: white;
            margin: 15px;
            transition: .3s;
        }

        .news-slider .card .card-body {
            margin-bottom: 25px;
        }

        .news-slider .card img {
            padding: 1.25rem;
            padding-top: 3rem;
        }

        .news-slider .card .card-title {
            font-weight: 700;
        }

        .news-slider .card .card-text {
            text-align: justify;
            font-size: 0.7rem;
        }

        /* Akhir Style Other */


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

    <section id="content" class="container-fluid" style="margin-top: -200px;">
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-6 col-9">
                <div>
                    <h2 class="judul teks-merah" style="font-size: 4vmax;">{{ $news->judul }}</h2>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-6 col-10">
                <div>
                    <img src="{{ asset($news->thumbnail) }}" class="w-100">
                    <p>{{ $news->created_at->translatedFormat('l, d F Y') }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-9 col-12">
                <div>
                    <textarea id="deskripsi">{!! $news->deskripsi !!}</textarea>
                </div>
            </div>
        </div>
    </section>

    <section id="other" class="container-fluid" style="margin-top: 50px;">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-6">
                <img src="{{ asset('images/kiri-detail-page.svg') }}" class="w-100">
            </div>
        </div>
        <div class="row my-4">
            <div class="col-lg-2 col-1"></div>
            <div class="col">
                <h3 style="color: #ED1C24; font-weight: 800">Berita Lainnya</h3>
            </div>
        </div>
        <div class="row">
            <div
                class="col-lg-2 col-1 d-none d-sm-none d-md-none d-lg-flex d-xl-flex align-items-center justify-content-end">
                <div class="news-prev-arrow text-right">
                    <img src="{{ asset('images/chevron-left-circle-dark.svg') }}" width="70%">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="news-slider">
                    @foreach ($otherNews as $other)
                        <div>
                            <div class="card">
                                <a href="{{ route('detail.news', $other->slug) }}" class="stretched-link"></a>
                                <img src="{{ asset($other->thumbnail) }}" class="card-img-top">
                                <div class="card-body">
                                    <h6 class="card-subtitle text-right">{{ $other->created_at->format('d.m.Y') }}</h6>
                                    <h5 class="card-title">{{ $other->judul }}</h5>
                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($other->deskripsi), 180, $end = '...') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-2 col-1 d-none d-sm-none d-md-none d-lg-flex d-xl-flex align-items-center">
                <div class="news-next-arrow">
                    <img src="{{ asset('images/chevron-right-circle-dark.svg') }}" width="70%">
                </div>
            </div>
        </div>
    </section>


@endsection


@push('js')
    <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.news-slider').slick({
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 2000,
                prevArrow: $('.news-prev-arrow'),
                nextArrow: $('.news-next-arrow'),
                responsive: [{
                    breakpoint: 775,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false,
                    }
                }]
            });
        });

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
