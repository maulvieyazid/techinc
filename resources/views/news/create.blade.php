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
                    <h3>Tambah News</h3>
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
                                <form class="form form-horizontal" method="POST" action="{{ route('news.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Kategori News</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <fieldset class="form-group">
                                                    <select class="form-select" id="slug_kategori" name="slug_kategori"
                                                        required>
                                                        <option value="" disabled selected>-- Pilih Kategori News --
                                                        </option>
                                                        @foreach ($semuaKategoriNews as $kategoriNews)
                                                            <option value="{{ $kategoriNews->slug }}">
                                                                {{ $kategoriNews->nama_kategori }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Judul News</label>
                                                <a href="#" id="info"><i class="bi bi-info-circle-fill"></i></a>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="judul" class="form-control" name="judul"
                                                    placeholder="Judul News" required autofocus>
                                            </div>

                                            <div class="col-md-2 pe-0">
                                                <label>Thumbnail News</label>
                                            </div>
                                            <div class="col-md-5 form-group">
                                                <input class="form-control" type="file" id="thumbnail" name="thumbnail"
                                                    accept="image/*">
                                            </div>
                                            <div class="col-5">
                                                <img id="image_preview" src="{{ asset('images/no-photos.webp') }}"
                                                    width="200" height="200" style="display: none">
                                            </div>

                                            <div class="col-md-2">
                                                <label>Isi News</label>
                                                <a href="#" id="info-isi"><i class="bi bi-info-circle-fill"></i></a>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea name="deskripsi" id="deskripsi"></textarea>
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
            var csrf = document.querySelector('meta[name="csrf-token"]').content;
            console.log(ClassicEditor);

            thumbnail.addEventListener('change', function() {
                if (this.files[0].size > 6291456) {
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
                .create(document.getElementById('deskripsi'), {
                    simpleUpload: {
                        // The URL that the images are uploaded to.
                        uploadUrl: "{{ route('upload.images.ckeditor') }}",

                        // Enable the XMLHttpRequest.withCredentials property.
                        // withCredentials: true,

                        // Headers sent along with the XMLHttpRequest to the upload server.
                        headers: {
                            'X-CSRF-TOKEN': csrf,
                            // Authorization: 'Bearer <JSON Web Token>'
                        }
                    }
                })
                .catch(error => {
                    console.error(error);
                });

            document.getElementById('info').addEventListener('click', () => {
                Swal.fire({
                    icon: "info",
                    html: `<h5>Slug akan dibuat berdasarkan Judul News. Contoh : <br> https://example.com/news/ini-adalah-slug</h5>`,
                })
            })

            document.getElementById('info-isi').addEventListener('click', () => {
                Swal.fire({
                    icon: "info",
                    html: `<h5>Jika gambar yang tampil tidak sama dengan gambar yang kamu upload, maka coba ganti nama dari file gambar tersebut</h5>`,
                })
            })
        </script>
    @endpush
@endsection
