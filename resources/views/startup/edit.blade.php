@extends('layouts.app', ['sidebar' => 'startup'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">

@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Startup</h3>
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
                                    <a href="{{ route('startup.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left-circle" style="vertical-align: sub"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal"
                                    action="{{ route('startup.update', $startup->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Startup</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="nama_startup" class="form-control" name="nama_startup"
                                                    placeholder="Nama Startup" value="{{ $startup->nama_startup }}" required
                                                    autofocus>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Logo Startup</label>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input class="form-control" type="file" id="logo" name="logo"
                                                    accept="image/*">
                                            </div>
                                            <div class="col-5">
                                                <img id="image_preview"
                                                    src="{{ asset($startup->logo ?? 'images/no-photos.webp') }}"
                                                    width="200" height="200">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Deskripsi Startup</label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea name="deskripsi" id="deskripsi">{!! $startup->deskripsi !!}</textarea>
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
        <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>

        <script>
            const logo = document.getElementById('logo')
            const image_preview = document.getElementById('image_preview')

            logo.addEventListener('change', function() {
                if (this.files[0].size > 6291456) {
                    Toastify({
                        text: "Logo tidak boleh melebihi 5 MB",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#ff0000",
                    }).showToast();
                    image_preview.style.display = "none"
                    this.value = ''
                } else {
                    image_preview.removeAttribute('style')
                    previewImage();
                }
            })

            function previewImage() {
                var oFReader = new FileReader();
                oFReader.readAsDataURL(logo.files[0]);

                oFReader.onload = function() {
                    image_preview.src = oFReader.result;
                };
            };

            ClassicEditor
                .create(document.getElementById('deskripsi'))
                .catch(error => {
                    console.error(error);
                });

        </script>
    @endpush
@endsection
