@extends('layouts.app', ['sidebar' => 'news'])

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Lihat News</h3>
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
                                    <a href="{{ route('news.index') }}" class="btn btn-secondary">
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
                                                <label>Kategori News</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" value="{{ $news->kategoriNews->nama_kategori }}"
                                                    class="form-control" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Judul News</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="judul" class="form-control" name="judul"
                                                    placeholder="Judul News" value="{{ $news->judul }}">
                                            </div>

                                            <div class="col-md-2 pe-0">
                                                <label>Thumbnail News</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <img id="image_preview"
                                                    src="{{ asset($news->thumbnail ?? 'images/no-photos.webp') }}"
                                                    width="200" height="200">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Isi News</label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea name="deskripsi" id="deskripsi">{!! $news->deskripsi !!}</textarea>
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
        <script src="{{ asset('vendors/ckeditor/ckeditor.js') }}"></script>

        <script>
            ClassicEditor
                .create(document.getElementById('deskripsi'))
                .catch(error => {
                    console.error(error);
                });

        </script>
    @endpush
@endsection
