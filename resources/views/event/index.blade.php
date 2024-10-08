@extends('layouts.app', ['sidebar' => 'event'])

@push('styles')
    <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/sweetalert2/sweetalert2.min.css') }}">
@endpush

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Event</h3>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col d-flex justify-content-end">
                            <a href="{{ route('event.create') }}" class="btn btn-primary ">
                                <i class="bi bi-plus-circle" style="vertical-align: sub"></i> Tambah
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-responsive" id="table_master">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Event</th>
                                <th>Status</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($semuaEvent as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->nama_event }}</td>
                                    <td>
                                        {{-- Jika Tanggal Mulai > sekarang --}}
                                        @if ($event->tanggal_mulai->gt(date('Y-m-d H:i:s')) )
                                            <span class="badge rounded-pill bg-primary">Akan Datang</span>
                                        {{-- Jika Tanggal Mulai < sekarang && Tanggal Selesai > sekarang --}}
                                        @elseif ($event->tanggal_mulai->lt(date('Y-m-d H:i:s')) && $event->tanggal_selesai->gt(date('Y-m-d H:i:s')) )
                                            <span class="badge rounded-pill bg-warning text-dark">Sedang Berlangsung</span>
                                        {{-- Jika Tanggal Selesai < sekarang --}}
                                        @elseif ($event->tanggal_selesai->lt(date('Y-m-d H:i:s')) )
                                            <span class="badge rounded-pill bg-success">Selesai</span>
                                        @endif
                                    </td>
                                    <td>{{ $event->tanggal_mulai->translatedFormat('l, d F Y H:i:s') }}</td>
                                    <td>{{ $event->tanggal_selesai->translatedFormat('l, d F Y H:i:s') }}</td>
                                    <td>
                                        <div class="btn-group dropstart  mb-1">
                                            <button type="button" class="btn btn-info dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Aksi
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('event.show', $event->slug) }}">
                                                    <i class="bi bi-eye-fill me-50"></i> Lihat
                                                </a>
                                                <a class="dropdown-item" href="{{ route('event.edit', $event->slug) }}">
                                                    <i class="bi bi-pencil-square me-50"></i> Ubah
                                                </a>
                                                <a class="dropdown-item" href=""
                                                    onclick="event.preventDefault(); hapus(this, '{{ $event->nama_event }}')">
                                                    <i class="bi bi-trash-fill me-50"></i> Hapus
                                                    <form action="{{ route('event.destroy', $event->slug) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>

    @push('scripts')
        <script src="{{ asset('vendors/simple-datatables/simple-datatables.js') }}"></script>
        <script src="{{ asset('vendors/sweetalert2/sweetalert2.all.min.js') }}"></script>
        <script>
            /* Simple Datatable */
            let table_master = document.querySelector('#table_master');
            let dataTable = new simpleDatatables.DataTable(table_master);

            async function hapus(btn, item) {
                /* Sweet Alert 2 */
                const {
                    value: hapus
                } = await Swal.fire({
                    icon: "warning",
                    title: "Peringatan",
                    text: `Apakah anda yakin ingin menghapus ${item}?`,
                    showCancelButton: true,
                })

                if (hapus) {
                    btn.children[1].submit();
                }
            }
        </script>
    @endpush
@endsection
