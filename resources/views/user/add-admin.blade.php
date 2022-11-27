@extends('frontend.main')
@push('title')
    <title>Add Admin</title>
@endpush

@section('content')
    <div class="add-admin">
        <div class="d-flex justify-content-center">
            <div class="card m-5 p-4" style="width: 18rem;">
                Admin Panel Login
                <hr>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
@endsection
