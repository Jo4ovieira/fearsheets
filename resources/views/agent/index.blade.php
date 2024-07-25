@extends('components.layout')

@section('content')

<div class="col-lg-12 col-sm-12 col-md-12 col-12">
    <div class="row">
        @if (Auth::check())
            <div class="col-lg-9 col-sm-9 col-md-9 col-9 marg">
                <span class="agents">{{Auth::user()->name}}'s agents</span>
            </div>
            <div class="col-lg-3 col-sm-3 col-md-3 col-3 text-end marg">
                <a href="/agents/create" class="btn-new"><i class="fa-solid fa-plus"></i>New</a>
            </div>
        @else
            <div class="col-lg-6 col-sm-6 col-md-6 col-6 marg">
                <span class="agents">You must be <a href="/login" class="custom-link">logged</a> to see your agents.</span>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-6 text-end marg">
                <span>Don't have an account? <a href="/register" class="custom-link">Create</a> one!</span>
            </div>
        @endif
        @foreach ($agent as $a)
            @if ($a->user_id == optional(Auth::user())->id)
                <div onclick="editAgent({{$a->id}})" class="col-12 col-sm-6 col-md-4 col-lg-3 col-xs-2 cards box">
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-md-12 col-12 card-fix">
                            <span>{{$a->agent_name}}</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-4 text-end card-fix">
                            <span class="life"><i class="fa-solid fa-plus"></i>: {{$a->lp}}</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-4 text-center card-fix">
                            <span class="san"><i class="fa-solid fa-brain"></i>: {{$a->sp}}</span>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-4 text-start card-fix">
                            <span class="effort"><i class="fa-solid fa-bolt"></i>: {{$a->ep}}</span>
                        </div>
                        <div class="col-lg-8 col-sm-8 col-md-8 col-8 text-start card-fix">
                            @foreach ($class as $c)
                            @if ($a->class == $c->id)
                            Class: {{$c->class}}
                            @endif
                            @endforeach
                        </div>
                        <div class="col-lg-4 col-sm-4 col-md-4 col-4 text-end card-fix">
                            @foreach ($nex as $n)
                                @if ($a->nex == $n->id)
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

@endsection
