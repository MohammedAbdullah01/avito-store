@if (session()->has('success'))
    <div class="alert alert-success ">
        <i class="bi bi-check-circle me-1"></i>
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">
        <i class="bi bi-exclamation-octagon me-1"></i>
        {{ session('error') }}
    </div>
@endif

@if (session()->has('info'))
    <div class="alert alert-info ">
        <i class="bi bi-info-circle me-1"></i>
        {{ session('info') }}
    </div>
@endif

@if (session()->has('warning'))
    <div class="alert alert-info " role="alert">
        <i class="bi bi-exclamation-triangle me-1"></i>
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
@endif


@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger  text-light border-0 ">
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ $error }}
        </div>
    @endforeach
@endif
