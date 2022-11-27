@extends('backend.main')
@push('title')
    <title>Profile Update</title>
@endpush

@section('content')
    <div class="card card-default pl-3 p-2">
        <h1>{{ $model->profile_name }}</h1>
    </div>
    <div class="card card-default p-2">
        {!! Form::model($model, ['route' => 'user.profile-update', 'method' => 'post', 'files' => true]) !!}
        <div class="mb-3">
            {!! Form::label('profile_name', 'Profile Name') !!}
            {!! Form::text('profile_name', $model->profile_name, [
                'class' => 'form-control',
                'id' => 'profile_name',
                'placeholder' => 'Profile Name',
            ]) !!}
            <x-error label='profile_name' />
        </div>
        <div class="mb-3">
            {!! Form::label('profile_image', 'Profile Image') !!}
            {!! Form::file('profile_image', ['class' => 'form-control', 'id' => 'profile_image']) !!}
            <x-error label='profile_image' />
        </div>
        <div class="mb-3">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', $model->email, ['class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'readonly' => true]) !!}
            <x-error label='email' />
        </div>
        <div class="mb-3">
            {!! Form::label('address', 'Address') !!}
            {!! Form::textarea('address', $model->address, [
                'class' => 'form-control',
                'id' => 'address',
                'placeholder' => 'Address',
                'rows' => 4,
            ]) !!}
            <x-error label='address' />
        </div>
        <div class="mb-3">
            {!! Form::label('pan', 'PAN Card Number') !!}
            {!! Form::text('pan', $model->pan, [
                'class' => 'form-control',
                'id' => 'pan',
                'placeholder' => 'PAN Card Number',
                'maxlength' => 10
            ]) !!}
            <x-error label='pan' />
        </div>
        <div class="mb-3">
            {!! Form::label('aadhar', 'Aadhar Card Number') !!}
            {!! Form::text('aadhar', $model->aadhar, [
                'class' => 'form-control',
                'id' => 'aadhar',
                'placeholder' => 'Aadhar Card Number',
                'maxlength' => 12
            ]) !!}
            <x-error label='aadhar' />
        </div>
        <div class="mb-3">
            {!! Form::submit('Update', ['class' => 'btn btn-sm btn-success']) !!}
        </div>
        {!! Form::close() !!}
    </div>
@endsection
