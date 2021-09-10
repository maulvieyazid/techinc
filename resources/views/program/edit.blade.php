@extends('layouts.app', ['sidebar' => 'program'])

@push('styles')

@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Program</h3>
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
                                <form class="form form-horizontal" method="POST"
                                    action="{{ route('program.update', $program->id_program) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-1">
                                                <label>Urutan</label>
                                            </div>
                                            <div class="col-md-11 form-group">
                                                <input type="number" class="form-control" name="urutan"
                                                    value="{{ $program->urutan }}" placeholder="Urutan" min="0"
                                                    oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                            </div>

                                            <div class="col-md-1">
                                                <label>Tahap</label>
                                            </div>
                                            <div class="col-md-11 form-group">
                                                <input type="text" class="form-control" name="tahap"
                                                    value="{{ $program->tahap }}" placeholder="Tahap" required>
                                            </div>

                                            <div class="col-md-2">
                                                <label>Deskripsi</label>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <textarea class="form-control" name="deskripsi"
                                                    rows="5">{{ $program->deskripsi }}</textarea>
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

        </script>
    @endpush
@endsection
