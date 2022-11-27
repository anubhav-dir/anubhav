@include('backend.header')
@push('title')
    <title>Login</title>
@endpush

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="card card-default mb-0">
                        <div class="card-header pb-0">
                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <a class="w-auto pl-0" href="{{url('/')}}">
                                    <img src="{{url('/storage/theme/images/logo.png')}}" alt="Mono">
                                    <span class="brand-name text-dark">Anubhav</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-5 pb-5 pt-0">
                            <h4 class="text-dark mb-6 text-center">Sign In</h4>

                            {!! Form::model($model, ['route' => 'login']) !!}
                                <div class="row">
                                    <div class="form-group col-md-12 mb-2">
                                        {!! Form::email('email', $model->email, ['class' => 'form-control input-lg', 'id'=>'email', 'placeholder' => 'Email']) !!}
                                        <x-error label="email"/>
                                    </div>
                                    <div class="form-group col-md-12 mb-2">
                                        {!! Form::password('password', ['class' => 'form-control input-lg', 'id'=>'password', 'placeholder' => 'Password']) !!}
                                        <x-error label="password"/>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex justify-content-between mb-3">
                                            <a class="text-color" href="#"> Forgot password? </a>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>
                                        <p>Don't have an account yet ?
                                            <a class="text-blue" href="#">Sign Up</a>
                                        </p>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@include('backend.footer')
