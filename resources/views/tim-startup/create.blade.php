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
                    <h3>Tambah Tim Startup Test</h3>
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
                                <form class="form form-horizontal" method="POST" action="{{ route('tim-startup.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Startup</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="tim[0][slug_startup]" required>
                                                        <option value="" disabled selected>-- Pilih Startup --
                                                        </option>
                                                        @foreach ($semuaStartup as $startup)
                                                            <option value="{{ $startup->slug }}">
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
                                                <input type="text" class="form-control" name="tim[0][nama]"
                                                    placeholder="Nama" required autofocus>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Posisi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" class="form-control" name="tim[0][posisi]"
                                                    placeholder="Posisi">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="radio" class="btn-check" name="tim[0][status]"
                                                    id="success-outlined" autocomplete="off" value="1" checked>
                                                <label class="btn btn-outline-success" for="success-outlined">
                                                    Aktif
                                                </label>
                                                <input type="radio" class="btn-check" name="tim[0][status]"
                                                    id="danger-outlined" autocomplete="off" value="2">
                                                <label class="btn btn-outline-danger" for="danger-outlined">
                                                    Tidak Aktif
                                                </label>
                                            </div>


                                            <div class="col-md-2 pe-0">
                                                <label>Foto</label>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input class="form-control" type="file" name="tim[0][foto]" accept="image/*"
                                                    onchange="showImage(this, 'image_preview0')">
                                            </div>
                                            <div class="col-5 mb-3">
                                                <img id="image_preview0" src="" width="200" height="200"
                                                    style="display: none">
                                            </div>

                                            <hr>

                                            <div id="added_item">

                                            </div>

                                            <div class="col-md-12 d-flex justify-content-center">
                                                <button type="button" class="btn btn-success" id="add" onclick="addItem()">
                                                    {{-- <i class="bi bi-plus" style="vertical-align: text-top; font-size: xx-large"></i> --}}
                                                    <i class="bi bi-plus-circle" style="vertical-align: sub"></i> Tambah Tim
                                                </button>
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
            let countItem = 0;

            function showImage(obj, image_container) {
                let image_preview = document.getElementById(image_container)
                if (obj.files[0].size > 6291456) {
                    Toastify({
                        text: "Foto tidak boleh melebihi 5 MB",
                        duration: 3000,
                        close: true,
                        gravity: "top",
                        position: "right",
                        backgroundColor: "#ff0000",
                    }).showToast();
                    image_preview.style.display = "none"
                    obj.value = ''
                } else {
                    image_preview.removeAttribute('style')
                    var oFReader = new FileReader();
                    oFReader.readAsDataURL(obj.files[0]);

                    oFReader.onload = function() {
                        image_preview.src = oFReader.result;
                    };
                }
            }

            function addItem() {
                countItem++;
                document.getElementById("added_item").insertAdjacentHTML('beforeend',
                    `
                    <div class="row mt-4">
                        <div class="col-md-2">
                            <label>Startup</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <fieldset class="form-group">
                                <select class="form-select" name="tim[${countItem}][slug_startup]"
                                    required>
                                    <option value="" disabled selected>-- Pilih Startup --
                                    </option>
                                    @foreach ($semuaStartup as $startup)
                                        <option value="{{ $startup->slug }}">
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
                            <input type="text" class="form-control" name="tim[${countItem}][nama]"
                                placeholder="Nama" required autofocus>
                        </div>

                        <div class="col-md-2">
                            <label>Posisi</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input type="text" class="form-control" name="tim[${countItem}][posisi]"
                                placeholder="Posisi" >
                        </div>

                        <div class="col-md-2">
                            <label>Status</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input type="radio" class="btn-check" name="tim[${countItem}][status]" id="success-outlined${countItem}"
                                autocomplete="off" value="1" checked>
                            <label class="btn btn-outline-success" for="success-outlined${countItem}">
                                Aktif
                            </label>
                            <input type="radio" class="btn-check" name="tim[${countItem}][status]" id="danger-outlined${countItem}"
                                autocomplete="off" value="2">
                            <label class="btn btn-outline-danger" for="danger-outlined${countItem}">
                                Tidak Aktif
                            </label>
                        </div>

                        <div class="col-md-2 pe-0">
                            <label>Foto</label>
                        </div>
                        <div class="col-md-5 form-group">
                            <input class="form-control" type="file" name="tim[${countItem}][foto]"
                                accept="image/*" onchange="showImage(this, 'image_preview${countItem}')">
                        </div>
                        <div class="col-5 mb-3">
                            <img id="image_preview${countItem}" src="" width="200" height="200"
                                style="display: none">
                        </div>

                        <hr>

                    </div>
                    `
                )
            }
        </script>
    @endpush
@endsection
