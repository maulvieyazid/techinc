@extends('layouts.app', ['sidebar' => 'document'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">

@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Dokumen</h3>
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
                                <form class="form form-horizontal" method="POST"
                                    action="{{ route('document.update', $document->id_document) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Dokumen</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" class="form-control" name="nama_document"
                                                    placeholder="Nama Dokumen" value="{{ $document->nama_document }}" required
                                                    autofocus>
                                            </div>

                                            <div class="col-md-2 pe-0">
                                                <label>File</label>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input class="form-control" type="file" id="file" name="file">
                                            </div>
                                            <div class="col-md-5 form-group">
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

                                            <div class="col-md-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
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
        <script src="{{ asset('vendors/toastify/toastify.js') }}"></script>
        <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

        <script>
            // const foto = document.getElementById('foto')
            // const image_preview = document.getElementById('image_preview')

            // foto.addEventListener('change', function() {
            //     if (this.files[0].size > 6291456) {
            //         Toastify({
            //             text: "Foto tidak boleh melebihi 5 MB",
            //             duration: 3000,
            //             close: true,
            //             gravity: "top",
            //             position: "right",
            //             backgroundColor: "#ff0000",
            //         }).showToast();
            //         image_preview.style.display = "none"
            //         this.value = ''
            //     } else {
            //         image_preview.removeAttribute('style')
            //         previewImage();
            //     }
            // })

            // function previewImage() {
            //     var oFReader = new FileReader();
            //     oFReader.readAsDataURL(foto.files[0]);

            //     oFReader.onload = function() {
            //         image_preview.src = oFReader.result;
            //     };
            // };
        </script>
    @endpush
@endsection
