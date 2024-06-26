@extends('components.layout')

@section('content')

        <form method="POST" action="{{route('terminal.access')}}">
            <div class="d-flex flex-column align-items-center inconsolata-retro justify-content-center">
                <div class="login">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12 login-align text-center">
                        <h1 class="inconsolata-retro">Terminal</h1>
                    </div>
                    @csrf
                    @if($errors->any())
                        <div class="col-lg-12 col-md-12 col-12 col-sm-12 text-start">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>
                                        <span>{{$error}}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <label class="inconsolata-retro">User</label>
                        <div class="form-group">
                            <input type="text" class="inconsolata-retro" name="user">
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <label class="inconsolata-retro">Password</label>
                        <div class="form-group">
                            <input type="password" class="inconsolata-retro" name="password">
                        </div>
                        <button title="access" class="inconsolata-retro btn-retro">access</button>
                    </div>
                </div>
            </div>
        </form>

@endsection
