@extends('layouts.app', ['sidebar' => 'roleMember'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Role Member</h3>
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
                                    <a href="{{ route('role-member.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left-circle" style="vertical-align: sub"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="{{ route('role-member.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-5 form-group">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="role[0][id_member]" required>
                                                        <option value="" disabled selected>-- Pilih Member --
                                                        </option>
                                                        @foreach ($semuaMember as $member)
                                                            <option value="{{ $member->id_member }}">
                                                                {{ $member->nama_member }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-1 pe-0">
                                                <label>Sebagai</label>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="role[0][id_jenis]" required>
                                                        <option value="" disabled selected>-- Pilih Jenis Member --
                                                        </option>
                                                        @foreach ($semuaJenisMember as $jenisMember)
                                                            <option value="{{ $jenisMember->id_jenis }}">
                                                                {{ $jenisMember->nama_jenis }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>

                                            <hr>


                                            <div id="added_item">

                                            </div>

                                            <div class="col-md-12 d-flex justify-content-center">
                                                <button type="button" class="btn btn-success" id="add" onclick="addItem()">
                                                    <i class="bi bi-plus-circle" style="vertical-align: sub"></i> Tambah
                                                    Role Member
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
                    <div class="row mt-2">
                        <div class="col-md-5 form-group">
                            <fieldset class="form-group">
                                <select class="form-select" name="role[${countItem}][id_member]"
                                    required>
                                    <option value="" disabled selected>-- Pilih Member --
                                    </option>
                                    @foreach ($semuaMember as $member)
                                        <option value="{{ $member->id_member }}">
                                            {{ $member->nama_member }}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <div class="col-md-1 pe-0">
                            <label>Sebagai</label>
                        </div>
                        <div class="col-md-5 form-group">
                            <fieldset class="form-group">
                                <select class="form-select" name="role[${countItem}][id_jenis]"
                                    required>
                                    <option value="" disabled selected>-- Pilih Jenis Member --
                                    </option>
                                    @foreach ($semuaJenisMember as $jenisMember)
                                        <option value="{{ $jenisMember->id_jenis }}">
                                            {{ $jenisMember->nama_jenis }}
                                        </option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>

                        <hr>

                    </div>
                    `
                )
            }
        </script>
    @endpush
@endsection
