@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($message = Session::get('danger'))
    <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if ($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible fade show mt-2" role="alert">
        <strong>{{ $message }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
