@extends('components.layout')

@section('content')

<div class="container">
    <form method="POST" action="{{route('agent.addAgent')}}">
        <div class="row">
            @csrf
            {{-- Retorno de erros da validation -> --}}
            @if($errors->any())
                <div class="col-lg-12 col-md-12 col-12 col-sm-12 text-start">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <input type="text" value="{{Auth::user()->id}}" hidden name="user_id">
            <div class="col-12 col-sm-6 col-md-5 col-lg-6 col-xl-6">
                <label>Agent name</label>
                <div class="form-group">
                    <input type="text" class="input_atk input_atk-top" name="agent_name" placeholder="Maquimbo Mcoy...">
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-2 col-lg-1 col-xl-1" id="nex_box">
                <label>Nex</label>
                <div class="form-group">
                    <select name="nex" onchange="statsTotal(), MainElement()" class="input_atk input_atk-top input_sel" id="nex">
                        @foreach ($nex as $n)
                            <option value="{{$n->id}}">{{$n->nex}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-2 col-lg-1 col-xl-1" style="display: none;" id="level_box">
                <label>Level</label>
                <div class="form-group">
                    <select name="nex" onchange="statsTotal()" class="input_atk input_atk-top input_sel" id="level" disabled="disabled">
                        @foreach ($nex as $n)
                            @if ($n->id <= 4)
                                <option value="{{$n->id}}">{{$n->id}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2">
                <label>Class</label>
                <div class="form-group">
                    <select name="class" onchange="statsTotal()" class="input_atk input_atk-top input_sel" id="class">
                        @foreach ($class as $c)
                            <option value="{{$c->id}}">{{$c->class}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                <label>Origin</label>
                <div class="form-group">
                    <input type="text" class="input_atk input_atk-top" name="origin" id="origin" placeholder="Fighter...">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="container-a">
                    <span class="attr agi-s">Agility</span>
                    <input required="" class="attr agi attr-inp" onclick="baseDefense()" onchange="baseDefense(), D20agi()" onkeyup="baseDefense(), D20agi()" type="number" min="-25" max="25" value="1" id="agility" name="agility" title="Agility">
                    <span class="attr str-s">Strength</span>
                    <input required="" class="attr str attr-inp" onchange="statsTotal(), D20str()" onkeyup="statsTotal(), D20str()" type="number" min="-25" max="25" value="1" id="strength" name="strength" title="Strength">
                    <span class="attr int-s">Intelligence</span>
                    <input required="" class="attr int attr-inp" onchange="statsTotal(), D20int()" onkeyup="statsTotal(), D20int()" type="number" min="-25" max="25" value="1" id="intelligence" name="intelligence" title="Intelligence">
                    <span class="attr pre-s">Presence</span>
                    <input required="" class="attr pre attr-inp" onchange="statsTotal(), D20pre()" onkeyup="statsTotal(), D20pre()" type="number" min="-25" max="25" value="1" id="presence" name="presence" title="Presence">
                    <span class="attr vig-s">Vigor</span>
                    <input required="" class="attr vig attr-inp" onchange="statsTotal(), D20vig()" onkeyup="statsTotal(), D20vig()" type="number" min="-25" max="25" value="1" id="vigor" name="vigor" title="Vigor">
                    <img src="{{ asset('img/pentagrama.png') }}" alt="pentagram">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-6 col-sm-2">
                        <label class="life base-labels">Life <i class="fa-solid fa-plus"></i></label>
                        <label class="life altered-labels"><i class="fa-solid fa-plus"></i></label>
                        <div class="form-group">
                            <input name="lp" type="text" id="life" class="input_atk input_atk-top">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6 col-sm-2">
                        <div class="form-group" style="margin-top: 20px;">
                            <li class="life">Lp per nex: <span id="lpNex"></span></li>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6 col-sm-2">
                        <label class="san base-labels">Sanity <i class="fa-solid fa-brain"></i></label>
                        <label class="san altered-labels"><i class="fa-solid fa-brain"></i></label>
                        <div class="form-group">
                            <input name="sp" type="text" id="san" class="input_atk input_atk-top">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6 col-sm-2">
                        <div class="form-group" style="margin-top: 20px;">
                            <li class="san">San per nex: <span id="sanNex"></span></li>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6 col-sm-2">
                        <label class="effort base-labels">Effort <i class="fa-solid fa-bolt"></i></label>
                        <label class="effort altered-labels"><i class="fa-solid fa-bolt"></i></label>
                        <div>
                            <input name="ep" type="text" id="effort" class="input_atk input_atk-top">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6 col-sm-2">
                        <div class="form-group" style="margin-top: 20px;">
                            <li class="effort">Ep per nex: <span id="effNex"></span></li>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                        <label>Movement by meters</label>
                        <div class="form-group">
                            <input name="mov_meters" value="9m" type="text" class="input_atk input_atk-top" placeholder="9m">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 col-sm-3">
                        <label class="base-labels">Base Defense</label>
                        <label class="altered-labels">Defense</label>
                        <div class="form-group">
                            <input name="defense" id="baseDef" onclick="baseDefense()" type="text" class="input_atk input_atk-top">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 col-sm-3">
                        <div class="form-group" style="margin-top: 20px;">
                            <li>10 + <span id="defAgi">Agi</span> + <span id="pt">Protection</span></li>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <label>Proficiencies</label>
                        <div class="form-group">
                            <textarea name="proficiencies" id="prof" class="input_atk input_atk-top" cols="30" rows="4"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-6">
                <label>Patent</label>
                <div class="form-group">
                    <select class="input_atk input_atk-top input_sel" name="patent">
                        <option value="0">Recruit</option>
                        <option value="1">Operator</option>
                        <option value="2">Special Agent</option>
                        <option value="3">Operation Official</option>
                        <option value="4">Elite Agent</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-6">
                <label>Protection</label>
                <div class="form-group">
                    <select class="input_atk input_atk-top input_sel" onchange="baseDefense()" id="prot" name="protection">
                        <option value="0">None</option>
                        <option value="1">Light</option>
                        <option value="2">Heavy</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-12 padFix">
                <label>Resistances</label>
                <div class="form-group">
                    <input type="text" class="input_atk input_atk-top" name="resistances">
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 exp-box">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <label class="label-e">Expertise</label>
                    </div>
                    @foreach ($expertise as $exp)
                        <div class="col-lg-2 exp">
                            <label class="attr-{{$exp->attribute_used}}"></label>
                            <i class="fa-solid fa-dice-d20 d20"></i> + <span id="{{$exp->expertise}}T">0</span> +
                            <input type="text" name="{{strtolower($exp->expertise)}}_ex" class="extra"> <br>
                            {{$exp->expertise}} <br>
                            <select class="exp-selector" onchange="expertisePoints()" name="{{ strtolower($exp->expertise) }}" id="{{$exp->expertise}}">
                                <option value="0">Untrained</option>
                                <option value="1">Trained</option>
                                <option value="2">Veteran</option>
                                <option value="3">Expert</option>
                            </select>
                        </div>
                    @endforeach
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-start">
                        <i class="fa-solid fa-triangle-exclamation warning"></i> You have <span id="expertisePoints"></span> expertise points to use<span id="expertiseObligated"></span> <i class="fa-solid fa-triangle-exclamation warning"></i>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 exp-box" style="display: none;" id="paranormal">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <label class="label-e">Paranormal <i class="fa-regular fa-eye box-icon"></i></label>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
                        <label>Main Element</label>
                        <div class="form-group">
                            <select name="element" class="input_atk input_atk-top input_sel">
                                <option value="0">None</option>
                                @foreach ($element as $e)
                                    @if ($e->id <= 4)
                                        <option value="{{$e->id}}">{{$e->element}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-start fix">
                <button class="btn-add" title="register_action">Save</button>
            </div>
        </div>
    </form>
</div>

@endsection
