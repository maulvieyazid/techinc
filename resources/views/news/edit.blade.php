@extends('layouts.app', ['sidebar' => 'news'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">

@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah News</h3>
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
                                <form class="form form-horizontal" method="POST"
                                    action="{{ route('news.update', $news->slug) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Kategori News</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="slug_kategori" name="slug_kategori"
                                                        required>
                                                        <option value="" disabled>-- Pilih Kategori News --</option>
                                                        @foreach ($semuaKategoriNews as $kategoriNews)
                                                            <option value="{{ $kategoriNews->slug }}" @if ($kategoriNews->slug == $news->slug_kategori) {{ 'selected' }} @endif>
                                                                {{ $kategoriNews->nama_kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Judul News</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="judul" class="form-control" name="judul"
                                                    placeholder="Judul News" value="{{ $news->judul }}" required
                                                    autofocus>
                                            </div>

                                            <div class="col-md-2 pe-0">
                                                <label>Thumbnail News</label>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input class="form-control" type="file" id="thumbnail" name="thumbnail"
                                                    accept="image/*">
                                            </div>
                                            <div class="col-5 mb-1">
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
        <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>

        <script>
            const thumbnail = document.getElementById('thumbnail')
            const image_preview = document.getElementById('image_preview')

            thumbnail.addEventListener('change', function() {
                if (this.files[0].size > 5242880) {
                    Toastify({
                        text: "Thumbnail tidak boleh melebihi 5 MB",
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
                oFReader.readAsDataURL(thumbnail.files[0]);

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
