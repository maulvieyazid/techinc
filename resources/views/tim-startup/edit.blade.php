@extends('layouts.app', ['sidebar' => 'timStartup'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">

@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Tim Startup</h3>
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
                                <form class="form form-horizontal" method="POST"
                                    action="{{ route('tim-startup.update', $timStartup->id_tim) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Startup</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="slug_startup" name="slug_startup"
                                                        required>
                                                        <option value="" disabled>-- Pilih Startup --</option>
                                                        @foreach ($semuaStartup as $startup)
                                                            <option value="{{ $startup->slug }}" @if ($startup->slug == $timStartup->slug_startup) {{ 'selected' }} @endif>
                                                                {{ $startup->nama_startup }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Nama</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="nama" class="form-control" name="nama"
                                                    placeholder="Nama" value="{{ $timStartup->nama }}" required
                                                    autofocus>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Posisi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="posisi" class="form-control" name="posisi"
                                                    placeholder="Posisi" value="{{ $timStartup->posisi }}" required
                                                    autofocus>
                                            </div>

                                            <div class="col-md-2 pe-0">
                                                <label>Foto</label>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input class="form-control" type="file" id="foto" name="foto"
                                                    accept="image/*">
                                            </div>
                                            <div class="col-5 mb-3">
                                                <img id="image_preview"
                                                    src="{{ asset($timStartup->foto ?? 'images/no-photos.webp') }}"
                                                    width="200" height="200">
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
            const foto = document.getElementById('foto')
            const image_preview = document.getElementById('image_preview')

            foto.addEventListener('change', function() {
                if (this.files[0].size > 5242880) {
                    Toastify({
                        text: "Foto tidak boleh melebihi 5 MB",
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
                oFReader.readAsDataURL(foto.files[0]);

                oFReader.onload = function() {
                    image_preview.src = oFReader.result;
                };
            };
        </script>
    @endpush
@endsection