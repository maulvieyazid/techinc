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
                    <h3>Tambah Dokumen</h3>
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
                                <form class="form form-horizontal" method="POST" action="{{ route('document.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Dokumen</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" class="form-control" name="document[0][nama_document]"
                                                    placeholder="Nama Dokumen" required autofocus>
                                            </div>

                                            <div class="col-md-2 pe-0">
                                                <label>File</label>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input class="form-control" type="file" name="document[0][file]" required>
                                            </div>

                                            <hr>

                                            <div id="added_item">

                                            </div>

                                            <div class="col-md-12 d-flex justify-content-center">
                                                <button type="button" class="btn btn-success" id="add" onclick="addItem()">
                                                    <i class="bi bi-plus-circle" style="vertical-align: sub"></i> Tambah
                                                    Dokumen
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
                            <label>Nama Dokumen</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input type="text" class="form-control" name="document[${countItem}][nama_document]"
                                placeholder="Nama Dokumen" required autofocus>
                        </div>

                        <div class="col-md-2 pe-0">
                            <label>File</label>
                        </div>
                        <div class="col-md-5 form-group">
                            <input class="form-control" type="file" name="document[${countItem}][file]" required>
                        </div>

                        <hr>

                    </div>
                    `
                )
            }
        </script>
    @endpush
@endsection
