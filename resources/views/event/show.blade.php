@extends('layouts.app', ['sidebar' => 'event'])

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Lihat Event</h3>
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
                                    <a href="{{ route('event.index') }}" class="btn btn-secondary">
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
                                                <label>Nama Event</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="nama_event" class="form-control" name="nama_event"
                                                    placeholder="Nama event" value="{{ $event->nama_event }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Tanggal Mulai</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="tanggal_mulai" class="form-control"
                                                    name="tanggal_mulai"
                                                    value="{{ $event->tanggal_mulai->translatedFormat('l, d F Y H:i:s') }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Tanggal Selesai</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="tanggal_selesai" class="form-control"
                                                    name="tanggal_selesai"
                                                    value="{{ $event->tanggal_selesai->translatedFormat('l, d F Y H:i:s') }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Link Daftar</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="link_daftar" class="form-control" name="link_daftar"
                                                    placeholder="Link Daftar" value="{{ $event->link_daftar }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Foto Event</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                @foreach ($event->file_photo() as $foto)
                                                    <img id="image_preview" src="{{ asset($foto) }}" class="me-2"
                                                        width="200" height="200">
                                                @endforeach
                                            </div>
                                            <div class="col-md-2">
                                                <label>Deskripsi Event</label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea name="deskripsi" id="deskripsi">{!! $event->deskripsi !!}</textarea>
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
        <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>

        <script>
            ClassicEditor
                .create(document.getElementById('deskripsi'))
                .catch(error => {
                    console.error(error);
                });
        </script>
    @endpush
@endsection
