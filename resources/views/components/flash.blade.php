@if (\Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> {!! \Session::get('success') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"></span>
    </button>
</div>
@endif
@if (\Session::has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {!! \Session::get('error') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"></span>
    </button>
</div>
@endif
@if (\Session::has('info'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>Info!</strong> {!! \Session::get('info') !!}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        <span aria-hidden="true"></span>
    </button>
</div>
@endif
