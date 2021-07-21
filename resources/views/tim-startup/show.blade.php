@extends('layouts.app', ['sidebar' => 'timStartup'])

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Lihat Tim Startup</h3>
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
                                    <a href="{{ route('tim-startup.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left-circle" style="vertical-align: sub"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Startup</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" value="{{ $timStartup->startup->nama_startup }}"
                                                    class="form-control" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="nama" class="form-control" name="nama"
                                                    placeholder="Nama" value="{{ $timStartup->nama }}">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Posisi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="posisi" class="form-control" name="posisi"
                                                    placeholder="Posisi" value="{{ $timStartup->posisi }}">
                                            </div>

                                            <div class="col-md-2 pe-0">
                                                <label>Foto</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <img id="image_preview"
                                                    src="{{ asset($timStartup->foto ?? 'images/no-photos.webp') }}"
                                                    width="200" height="200">
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
