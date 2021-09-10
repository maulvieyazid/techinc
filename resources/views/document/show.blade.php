@extends('layouts.app', ['sidebar' => 'document'])

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Lihat Dokumen</h3>
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
                                    <a href="{{ route('document.index') }}" class="btn btn-secondary">
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
                                                <label>Nama Dokumen</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="nama_document" class="form-control" name="nama_document"
                                                    placeholder="Nama Dokumen" value="{{ $document->nama_document }}">
                                            </div>

                                            <div class="col-md-2 pe-0">
                                                <label>File</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                {{-- Lihat File --}}
                                                <a href="{{ route('document.show.file', $document->id_document) }}"
                                                    target="_blank" class="btn btn-outline-primary" title="Lihat File">
                                                    <i class="bi bi-eye-fill" style="vertical-align: sub"></i>
                                                </a>
                                                {{-- Download File --}}
                                                <a href="{{ route('document.download.file', $document->id_document) }}"
                                                    target="_blank" class="btn btn-outline-primary" title="Unduh File">
                                                    <i class="bi bi-download" style="vertical-align: sub"></i>
                                                </a>
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
