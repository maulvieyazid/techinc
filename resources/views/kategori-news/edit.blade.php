@extends('layouts.app', ['sidebar' => 'kategoriNews'])

@push('styles')


@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Kategori News</h3>
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
                                    <a href="{{ route('kategori-news.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left-circle" style="vertical-align: sub"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal"
                                    action="{{ route('kategori-news.update', $kategoriNews->slug) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Kategori</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="nama_kategori" class="form-control"
                                                    name="nama_kategori" placeholder="Nama Kategori"
                                                    value="{{ $kategoriNews->nama_kategori }}" required autofocus>
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
            // document.getElementById('info').addEventListener('click', () => {
            //     Swal.fire(
            //         "Sebelum mengubah nama kategori, mohon diperhatikan bahwa sistem telah membuat slug pada tiap kategori <br> Sehingga perubahan pada nama kategori tidak akan mengubah slug yang telah dibuat."
            //     )
            // })
        </script>
    @endpush
@endsection
