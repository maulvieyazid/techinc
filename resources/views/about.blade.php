@extends('layouts.front.techinc', ['navbar' => 'about'])

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

        /* Style Tujuan */

        section#tujuan {
            background-image: url("{{ asset('images/bg-tujuan.svg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        /* Akhir Style Tujuan */

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
    {{-- <img src="{{ asset('images/bg-template-header.png') }}" class="position-absolute w-100 h-100"> --}}
    <header class="container-fluid vh-100">
        <div class="row align-items-end h-50">
            <div class="col-lg-2 col-1">
                <img src="{{ asset('images/kiri-template-header.svg') }}"
                    class="w-100 d-none d-sm-none d-md-none d-lg-block d-xl-block">
            </div>
            <div class="col-lg-10 col-10">
                <h1 class="text-white m-0 judul">About Us.</h1>
            </div>
        </div>
        <div class="row align-items-center h-50">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-6 col-9">
                <div>
                    <h2 class="judul teks-merah">Visi</h2>
                    <p class="isi">Menjadi Inkubator Bisnis Teknologi yang produktif dalam
                        berinovasi guna mendorong lahirnya Technopreneur di Indonesia</p>
                </div>
            </div>
        </div>
    </header>

    <section id="misi" class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-4 col-4">
                <img src="{{ asset('images/kiri-misi.svg') }}" class="w-75">
            </div>
            <div class="col-lg-6 col-6 pr-0">
                <div>
                    <h2 class="judul teks-merah">Misi</h2>
                    <ol class="isi" style="padding-left: 5%;">
                        <li>Memberikan fasilitas dan dukungan terhadap ide inovatif, agar menjadi startup unggulan di
                            masyarakat.</li>
                        <li>Menyelenggarakan inkubasi perusahaan pemula berbasis teknologi secara profesional.</li>
                        <li>Menghasilkan startup yang siap berkarya di masyarakat.</li>
                        <li>Mempercepat komersialisasi produk inovasi.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section id="tujuan" class="container-fluid" style="margin-top: 15%">
        <div class="row">
            <div class="col-lg-2 col-1"></div>
            <div class="col-lg-4 col-4">
                <img src="{{ asset('images/tujuan.svg') }}" class="w-75" style="margin-top: -15%">
            </div>
            <div class="col-lg-5 col-6 pr-0">
                <ol class="isi p-0 text-white">
                    <li>Meningkatkan alih teknologi hasil riset lembaga penelitian untuk meningkatkan
                        daya saing perusahaan baru berbasis inovasi teknologi.</li>
                    <li>Mendorong lahirnya wirausaha-wirausaha muda berbasis teknologi dan Perusahaan
                        Baru Berbasis Teknologi.</li>
                    <li>Memperkuat daya saing industri dalam negeri menuju ekonomi berbasis inovasi.
                    </li>
                    <li>Menciptakan lapangan pekerjaan baru berbasis inovasi teknologi bagi warga
                        masyarakat berpendidikan tinggi.</li>
                    <li>Meningkatkan kemandirian sumber pendanaan riset dari komersialisasi HKI/hasil
                        riset UNIVERSITAS DINAMIKA.</li>
                </ol>
            </div>
        </div>
    </section>

    <section id="team" class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-2 col-4 d-flex align-items-center">
                <img src="{{ asset('images/kiri-team-ibt.svg') }}" class="w-100">
            </div>
            <div class="col-8 bg-merah d-flex">
                <h1 class="judul text-white text-right">Team <br> IBT</h1>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-lg-3 row-cols-md-2 my-5">
            @foreach ($allMember as $member)
                <div class="col my-3">
                    <div class="card team-card">
                        <div class="rounded-circle bg-white avatar">
                            <img src="{{ asset($member->foto) }}" class="card-img-top mt-1"
                                alt="{{ $member->nama_member }}">
                        </div>
                        <div class="card-body text-center pt-0" style="height: 250px;">
                            <h5 class="card-title">{{ $member->nama_member }}</h5>
                            <p class="card-text">
                                @foreach ($member->jenisMember as $jenis)
                                    {{ $jenis->nama_jenis }} @if (!$loop->last) / @endif
                                @endforeach
                            </p>
                            <p class="card-text">{{ $member->deskripsi }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </section>

@endsection


@push('js')

@endpush
