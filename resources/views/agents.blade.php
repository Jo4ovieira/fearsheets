@extends('components.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-12 row">
            @if (Auth::check())
                <div class="col-lg-6 col-sm-6 col-md-6 col-6 marg">
                    <span class="agents">{{Auth::user()->name}}'s agents</span>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-6 text-end marg">
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
                    <div onclick="editAgent({{$a->id}})" class="col-lg-4 col-sm-4 col-md-4 col-4 cards fix2">
                        <div class="row">
                            <div class="col-lg-8 col-sm-8 col-md-8 col-8 fix2">
                                <span>{{$a->agent_name}}</span>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-4 text-end fix2">
                                @if ($a->nex == 0)
                                    Nex: 5%
                                @elseif ($a->nex == 1)
                                    Nex: 10%
                                @elseif ($a->nex == 2)
                                    Nex: 15%
                                @elseif ($a->nex == 3)
                                    Nex: 20%
                                @elseif ($a->nex == 4)
                                    Nex: 25%
                                @elseif ($a->nex == 5)
                                    Nex: 30%
                                @elseif ($a->nex == 6)
                                    Nex: 35%
                                @elseif ($a->nex == 7)
                                    Nex: 40%
                                @elseif ($a->nex == 8)
                                    Nex: 45%
                                @elseif ($a->nex == 9)
                                    Nex: 50%
                                @elseif ($a->nex == 10)
                                    Nex: 55%
                                @elseif ($a->nex == 11)
                                    Nex: 60%
                                @elseif ($a->nex == 12)
                                    Nex: 65%
                                @elseif ($a->nex == 13)
                                    Nex: 70%
                                @elseif ($a->nex == 14)
                                    Nex: 75%
                                @elseif ($a->nex == 15)
                                    Nex: 80%
                                @elseif ($a->nex == 16)
                                    Nex: 85%
                                @elseif ($a->nex == 17)
                                    Nex: 90%
                                @elseif ($a->nex == 18)
                                    Nex: 95%
                                @elseif ($a->nex == 19)
                                    Nex: 99%
                                @endif
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-2 fix3">
                                <span class="life"><i class="fa-solid fa-plus"></i>: {{$a->lp}}</span>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-2 fix3">
                                <span class="san"><i class="fa-solid fa-brain"></i>: {{$a->sp}}</span>
                            </div>
                            <div class="col-lg-2 col-sm-2 col-md-2 col-2 fix3">
                                <span class="effort"><i class="fa-solid fa-bolt"></i>: {{$a->ep}}</span>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-6 text-end fix3">
                                @if ($a->class == 0)
                                    Class: Other
                                @elseif ($a->class == 1)
                                    Class: Combatant
                                @elseif ($a->class == 2)
                                    Class: Specialist
                                @elseif ($a->class == 3)
                                    Class: Occultist
                                @endif
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

@endsection
