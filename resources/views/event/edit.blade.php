@extends('layouts.app', ['sidebar' => 'event'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/toastify/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flatpickr/flatpickr.min.css') }}">

@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Event</h3>
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
                                    <a href="{{ route('event.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left-circle" style="vertical-align: sub"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('event.update', $event->slug) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Event</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="nama_event" class="form-control" name="nama_event"
                                                    placeholder="Nama event" value="{{ $event->nama_event }}" required
                                                    autofocus>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Tanggal Mulai</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="tanggal_mulai" class="form-control"
                                                    name="tanggal_mulai"
                                                    value="{{ $event->tanggal_mulai->format('d F Y') }}"
                                                    placeholder="Tanggal Mulai" autocomplete="off">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Tanggal Selesai</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="tanggal_selesai" class="form-control"
                                                    name="tanggal_selesai"
                                                    value="{{ $event->tanggal_selesai->format('d F Y') }}"
                                                    placeholder="Tanggal Selesai" autocomplete="off">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Link Daftar</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="link_daftar" class="form-control" name="link_daftar"
                                                    placeholder="Link Daftar" value="{{ $event->link_daftar }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Foto Event</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input class="form-control" type="file" id="foto" name="foto[]"
                                                    accept="image/*" multiple>
                                            </div>
                                            <div class="col-12">
                                                <div id="image_preview" class="mb-3">
                                                    @foreach ($event->file_photo() as $foto)
                                                        <img id="image_preview" src="{{ asset($foto) }}" class="me-2"
                                                            width="200" height="200">
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Deskripsi Event</label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea name="deskripsi" id="deskripsi">{!! $event->deskripsi !!}</textarea>
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
        <script src="{{ asset('vendors/flatpickr/flatpickr.js') }}"></script>
        <script src="{{ asset('vendors/flatpickr/id.js') }}"></script>

        <script>
            const foto = document.getElementById('foto')
            const image_preview = document.getElementById('image_preview')

            foto.addEventListener('change', function() {
                Array.from(this.files).forEach(file => {
                    if (file.size > 6291456) {
                        Toastify({
                            text: "Foto tidak boleh melebihi 5 MB",
                            duration: 3000,
                            close: true,
                            gravity: "top",
                            position: "right",
                            backgroundColor: "#ff0000",
                        }).showToast();
                        this.value = ''
                    }
                })
                /* Kosongkan image_preview*/
                image_preview.innerHTML = ''
                previewImage();
            })

            function previewImage() {

                Array.from(foto.files).forEach(file => {
                    var oFReader = new FileReader();
                    let type = getType(file.type);

                    oFReader.addEventListener("load", function() {
                        if (type == 'video') {
                            var video = document.createElement("VIDEO");
                            video.setAttribute("src", this.result);
                            video.setAttribute("width", "200");
                            video.setAttribute("height", "200");
                            video.setAttribute("controls", "controls");
                            video.setAttribute("style", "vertical-align:middle; object-fit:cover");
                            video.setAttribute("class", "me-2");

                            image_preview.appendChild(video);
                        } else if (type == 'image') {
                            var image = new Image();
                            image.height = 200;
                            image.width = 200;
                            image.title = file.name;
                            image.className = 'me-2 mb-2';
                            image.src = this.result;

                            image_preview.appendChild(image);

                        }

                    });

                    oFReader.readAsDataURL(file);

                })
            };

            /* Ambil type file */
            function getType(type) {
                let arr = type.split('/');
                if (arr[0] == 'video') {
                    return 'video';
                }

                return 'image';
            }

            ClassicEditor
                .create(document.getElementById('deskripsi'))
                .catch(error => {
                    console.error(error);
                });

            flatpickr('#tanggal_mulai', {
                altInput: true,
                altFormat: "l, d F Y H:i:S",
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                // minTime: "09:00",
                // maxTime: "16:00",
                defaultDate: "{{ $event->tanggal_mulai }}",
                locale: 'id',
            })

            flatpickr('#tanggal_selesai', {
                altInput: true,
                altFormat: "l, d F Y H:i:S",
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                time_24hr: true,
                // minTime: "09:00",
                // maxTime: "16:00",
                defaultDate: "{{ $event->tanggal_selesai }}",
                locale: 'id',
            })
        </script>
    @endpush
@endsection
