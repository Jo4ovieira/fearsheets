@extends('components.layout')

@section('content')

    <div class="container">
        <form method="POST" action="{{route('login.loginAction')}}">
            <div class="center-align col-lg-8 col-md-8 col-8 col-sm-8">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12 login-align text-center">
                        <h1>Login</h1>
                    </div>
                    @csrf
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
                        <label>E-mail</label>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your email">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 col-sm-6">
                        <label>Password</label>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Your password">
                        </div>
                        <button class="btn-reg" title="login_action">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
