@extends('layouts.app', ['sidebar' => 'carouselImage'])

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Lihat Carousel Image</h3>
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
                                    <a href="{{ route('carousel-image.index') }}" class="btn btn-secondary">
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
                                                <label>Urutan</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="number" class="form-control" value="{{ $carousel->urutan }}"
                                                    placeholder="Urutan" min="0"
                                                    oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"
                                                    readonly>
                                            </div>

                                            <div class="col-md-2 pe-0">
                                                <label>Foto</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <img id="image_preview"
                                                    src="{{ asset($carousel->foto ?? 'images/no-photos.webp') }}"
                                                    width="200" height="200">
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

    @endpush
@endsection
