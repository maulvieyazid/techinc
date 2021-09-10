@extends('layouts.app', ['sidebar' => 'about'])

@push('styles')

@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>About</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('about.update', $about->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-5">
                            <label for="visi" class="form-label">Visi</label>
                            <textarea class="form-control" id="visi" name="visi" rows="5">{{ $about->visi ?? '' }}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea class="form-control" id="misi" name="misi" rows="15">{{ $about->misi ?? '' }}</textarea>
                        </div>
                        <div class="form-group mb-5">
                            <label for="tujuan" class="form-label">Tujuan</label>
                            <textarea class="form-control" id="tujuan" name="tujuan" rows="15">{{ $about->tujuan ?? '' }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </section>
    </div>

    @push('scripts')

    @endpush
@endsection
