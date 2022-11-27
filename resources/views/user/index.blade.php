@extends('backend.main')
@push('title')
    <title>Users</title>
@endpush

@section('content')

<div class="card card-default pl-3 p-2">
    <h1>Users</h1>
</div>

<div class="card card-default">
    <div class="card-header">
        <h2>Users</h2>
    </div>
    <div class="card-body">
        <table class="table table-hover table-product">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profile</th>
                    <th>Created at</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($model as $data)
                <tr>
                    <td>{{$data->id}}</td>
                    <td>{{$data->profile_name}}</td>
                    <td>{{$data->email}}</td>
                    <td>
                        <img src="{{ $data->getProfileImage() }}" alt="Product Image">
                    </td>
                    <td>{{$data->created_at}}</td>
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle icon-burger-mini" href="#" role="button"
                                id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                data-display="static">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="{{route('user.show', ['user'=>$data->id])}}">View</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="pagination">
    {!! $model->links() !!}
</div>

@endsection
