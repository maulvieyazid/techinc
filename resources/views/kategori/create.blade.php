@extends('layouts.app', ['sidebar' => 'kategori'])

@push('styles')
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Kategori</h3>
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
                                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left-circle" style="vertical-align: sub"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="{{ route('kategori.store') }}">
                                    @csrf
                                    <input type="hidden" name="folder_kategori" id="folder_kategori">
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Produk Startup</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <fieldset class="form-group">
                                                    <select class="form-select" name="slug_startup">
                                                        <option value="" selected>Tidak</option>
                                                        @foreach ($semuaStartup as $startup)
                                                            <option value="{{ $startup->slug }}">
                                                                {{ $startup->nama_startup }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Nama Kategori</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="nama_kategori" class="form-control"
                                                    name="nama_kategori" placeholder="Nama Kategori" required autofocus>
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
        <script>
            /* Set Folder Kategori */
            document.getElementById('nama_kategori').addEventListener('keyup', (obj) => {
                document.getElementById('folder_kategori').value = obj.target.value.toLowerCase();
            })
        </script>
    @endpush
@endsection
