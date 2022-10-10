@if (session()->has('success'))
    <div class="alert alert-success alert-common alert-dismissible " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <i class="tf-ion-thumbsup"></i>
        {{ session('success') }}
    </div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger alert-common alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <i class="bi bi-exclamation-octagon me-1"></i>
        {{ session('error') }}
    </div>
@endif

@if (session()->has('info'))
    <div class="alert alert-info alert-common alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <i class="bi bi-info-circle me-1"></i>
        {{ session('info') }}
    </div>
@endif

@if (session()->has('warning'))
    <div class="alert alert-warning alert-common alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
        <i class="bi bi-exclamation-triangle me-1"></i>
        {{ session('warning') }}
    </div>
@endif


@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-common alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <i class="bi bi-exclamation-octagon me-1"></i>
            {{ $error }}
        </div>
    @endforeach
@endif
