@if (session('success'))
    <div class="alert alert-success">
        <i class="bi bi-check-circle"></i>
        {{ session('success') }}
    </div>
@endif

@if (session('danger'))
    <div class="alert alert-danger">
        <i class="bi bi-file-excel"></i>
        {{ session('danger') }}
    </div>
@endif
