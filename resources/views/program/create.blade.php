@extends('layouts.app', ['sidebar' => 'program'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Program</h3>
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
                                    <a href="{{ route('program.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left-circle" style="vertical-align: sub"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="{{ route('program.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label>Urutan</label>
                                            </div>
                                            <div class="col-md-11 form-group">
                                                <input type="number" class="form-control" name="program[0][urutan]"
                                                    placeholder="Urutan" min="0"
                                                    oninput="this.value =
                                                        !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required autofocus>
                                            </div>

                                            <div class="col-md-1">
                                                <label>Tahap</label>
                                            </div>
                                            <div class="col-md-11 form-group">
                                                <input type="text" class="form-control" name="program[0][tahap]"
                                                    placeholder="Tahap" required>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Deskripsi</label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea class="form-control" name="program[0][deskripsi]" id="deskripsi"
                                                    rows="5"></textarea>
                                            </div>

                                            <hr>

                                            <div id="added_item">

                                            </div>

                                            <div class="col-md-12 d-flex justify-content-center">
                                                <button type="button" class="btn btn-success" id="add" onclick="addItem()">
                                                    <i class="bi bi-plus-circle" style="vertical-align: sub"></i> Tambah
                                                    Program
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

            function addItem() {
                countItem++;
                document.getElementById("added_item").insertAdjacentHTML('beforeend',
                    `
                    <div class="row mt-4">
                        <div class="col-md-1">
                            <label>Urutan</label>
                        </div>
                        <div class="col-md-11 form-group">
                            <input type="number" class="form-control" name="program[${countItem}][urutan]"
                                placeholder="Urutan" min="0" oninput="this.value =
                                !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" required autofocus>
                        </div>

                        <div class="col-md-1">
                            <label>Tahap</label>
                        </div>
                        <div class="col-md-11 form-group">
                            <input type="text" class="form-control" name="program[${countItem}][tahap]"
                                placeholder="Tahap" required>
                        </div>

                        <div class="col-md-2">
                            <label>Deskripsi</label>
                        </div>
                        <div class="col-md-12 form-group">
                            <textarea class="form-control" name="program[${countItem}][deskripsi]" id="deskripsi"
                                rows="5"></textarea>
                        </div>

                        <hr>

                    </div>
                    `
                )
            }
        </script>
    @endpush
@endsection
