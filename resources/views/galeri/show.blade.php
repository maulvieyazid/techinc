@extends('layouts.app', ['sidebar' => 'galeri'])

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Lihat Galeri</h3>
                </div>
            </div>
        </div>

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <a href="{{ route('galeri.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left-circle" style="vertical-align: sub"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Kategori</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" value="{{ $galeri->kategori->nama_kategori }}"
                                                    class="form-control" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>File</label>
                                            </div>
                                            <div class="col-12">
                                                @if ($galeri->tipe == 1)
                                                    <video width="700" class="me-2 mt-2 mb-3" src="{{ asset($galeri->file_galeri) }}" controls>
                                                    </video>
                                                @elseif ($galeri->tipe == 2)
                                                    <img id="image_preview" class="me-2 mt-2 mb-3"
                                                        src="{{ asset($galeri->file_galeri ?? 'images/no-photos.webp') }}"
                                                        width="700" height="700" title="{{ $galeri->nama_file }}">
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @push('scripts')

    @endpush
@endsection
