@extends('components.layout')

@section('content')

    <div class="container">
        <form method="POST" action="{{route('profile.updateProfile', Auth::user()->id)}}" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <div class="container-a">
                        <div class="round-img-frame" id="img_frame">
                            <img class="round-img" src="{{ asset($img) }}" alt="">
                            <label for="user_img" class="img-btn"><i class="fa-solid fa-pencil"></i></label>
                            <input type="file" name="user_img" class="user-img"/>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <label>Username</label>
                            <div class="form-group">
                                <input type="text" class="input_atk" value="{{$user->name}}" name="name" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xs-4">
                            <label>Favorite class</label>
                            <div class="form-group">
                                <select name="fav_class" class="input_atk input_atk-top input_sel">
                                    @foreach ($class as $c)
                                        <option {{$user->fav_class == $c->id ? "selected" : ""}} value="{{$c->id}}">{{$c->class}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xs-4">
                            <label>Favorite element</label>
                            <div class="form-group">
                                <select name="fav_element" onchange="loadAll()" class="input_atk input_atk-top input_sel" id="fav_element">
                                    @foreach ($element as $e)
                                        <option {{$user->fav_element == $e->id ? "selected" : ""}} value="{{$e->id}}">{{$e->element}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xs-4">
                            <label>Archetype</label>
                            <div class="form-group">
                                <input type="text" value="{{$user->archetype}}" class="input_atk" name="archetype">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12">
                            <label>About</label>
                            <div class="form-group">
                                <textarea name="about" class="input_atk input_atk-top" cols="30" rows="8">{{$user->about}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12 text-center">
                    <label class="label-e">Agents</label>
                </div>
                <div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xs-12 agent-pad">
                        <div class="row">
                            @foreach ($agents as $agent)
                                @if ($agent->user_id == $id & $agent->private == 1)
                                    <div onclick="editAgent({{$agent->id}})" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-2 box agent-card">
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-12 col-xs-12 text-center agent-fix">
                                                <span>{{$agent->agent_name}}</span>
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-4 col-xs-4 text-start data-fix">
                                                <span class="life"><i class="fa-solid fa-plus"></i>: {{$agent->lp}}</span>
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-4 col-xs-4 text-center data-fix">
                                                <span class="san"><i class="fa-solid fa-brain"></i>: {{$agent->sp}}</span>
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-4 col-xs-4 text-end data-fix">
                                                <span class="effort"><i class="fa-solid fa-bolt"></i>: {{$agent->ep}}</span>
                                            </div>
                                            <div class="col-lg-8 col-sm-8 col-md-8 col-8 col-xs-8 text-start data-fix">
                                                @foreach ($class as $c)
                                                    @if ($agent->class == $c->id)
                                                        Class: {{$c->class}}
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-4 col-xs-4 text-end data-fix">
                                                @foreach ($nex as $n)
                                                    @if ($agent->nex == $n->id)
                                                        {{$n->nex}}
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6 text-start">
                    <button class="btn-add" title="updateProfile">Save</button>
                </div>
                <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6 col-6 col-xs-6 text-end">
                    <b><a href="/logout" class="custom-link">LogOut</a></b>
                </div>
            </div>
        </form>
    </div>

@endsection
