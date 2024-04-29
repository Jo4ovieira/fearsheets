@extends('components.layout')

@section('content')

<div class="container">
    <form method="POST" action="{{route('register.register_action')}}">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12 text-center">
                <h1>Register</h1>
            </div>
            {{-- Validação para ultilizar o método post -> --}}
            @csrf
            {{-- Retorno de erros da validation -> --}}
            @if($errors->any())
                <div class="col-lg-6 col-md-6 col-6 col-sm-6 text-start">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-lg-6 col-md-6 col-6 col-sm-6">
                <label>Name</label>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Your name">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-6 col-sm-6">
                <label>E-mail</label>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="Your e-mail">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-6 col-sm-6">
                <label>Password</label>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Your password">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-6 col-sm-6">
                <label>Password confirmation</label>
                <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Your password">
                </div>
            </div>
            <button class="btn-reg" title="register_action">Register</button>
        </div>
    </form>
</div>

@endsection
