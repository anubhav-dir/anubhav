@extends('backend.main')
@push('title')
    <title>User</title>
@endpush

@section('content')
    <div class="card card-default pl-3 p-2">
        <h1>{{$model->profile_name}}</h1>
        <div class="d-flex justify-content-end">
            <a href="{{ route('user.edit', ['user' => $model->id]) }}" class="btn btn-primary btn-sm btn-pill m-1"><i class="mdi mdi-lead-pencil"></i> Update</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-12">
            <div class="card card-default">
                <img class="rounded-circle" src="{{ $model->getProfileImage() }}" alt="Profile Image">
            </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12">
            <div class="card card-default">
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Id</th>
                                <td>{{$model->id}}</td>
                                <th scope="col" class="text-end">Role</th>
                                <td>{{$model->getRole()}}</td>
                            </tr>
                            <tr>
                                <th scope="col" class="text-end">Profile Name</th>
                                <td>{{$model->profile_name}}</td>
                                <th scope="col" class="text-end">Email</th>
                                <td>{{$model->email}}</td>
                            </tr>
                            <tr>
                                <th scope="col" class="text-end">PAN Card Number</th>
                                <td>{{$model->pan}}</td>
                                <th scope="col" class="text-end">Aadhar Card Number</th>
                                <td>{{$model->aadhar}}</td>
                            </tr>
                            <tr>
                                <th scope="col" class="text-end">Address</th>
                                <td colspan="3">{{$model->address}} </td>
                            </tr>
                            <tr>
                                <th scope="col" class="text-end">Created At</th>
                                <td>{{$model->created_at}}</td>
                                <th scope="col" class="text-end">Updated At</th>
                                <td>{{$model->updated_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
