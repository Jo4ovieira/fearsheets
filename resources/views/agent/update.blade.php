@extends('components.layout')

@section('content')

<div class="container">
    <form method="POST" action="{{route('agent.updateAgent')}}">
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
            {{-- Agents --}}
            <input type="text" value="{{$id}}" hidden name="id">
            <div class="col-12 col-sm-6 col-md-5 col-lg-6 col-xl-6">
                <label>Agent name</label>
                <div class="form-group">
                    <input type="text" class="input_atk input_atk-top" value="{{$agent->agent_name}}" name="agent_name" placeholder="Maquimbo Mcoy...">
                </div>
            </div>
            <div class="col-6 col-sm-6 col-md-2 col-lg-1 col-xl-1" id="nex_box">
                <label>Nex</label>
                <div class="form-group">
                    <select name="nex" onchange="statsTotal(), MainElement()" class="input_atk input_atk-top input_sel" id="nex">
                        @foreach ($nex as $n)
                            <option {{$agent->nex == $n->id ? "selected" : ""}} value="{{$n->id}}">{{$n->nex}}</option>
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
                                <option {{$agent->nex == $n->id ? "selected" : ""}} value="{{$n->id}}">{{$n->id}}</option>
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
                            <option {{$agent->class == $c->id ? "selected" : ""}} value="{{$c->id}}">{{$c->class}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
                <label>Origin</label>
                <div class="form-group">
                    <input type="text" class="input_atk input_atk-top" value="{{$agent->origin}}" name="origin" id="origin" placeholder="Fighter...">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="container-a">
                    <span class="attr agi-s">Agility</span>
                    <input required="" class="attr agi attr-inp" value="{{$agent->agility}}" onclick="baseDefense()" onchange="baseDefense(), D20agi()" onkeyup="baseDefense(), D20agi()" type="number" min="-25" max="25" value="1" id="agility" name="agility" title="Agility">
                    <span class="attr str-s">Strength</span>
                    <input required="" class="attr str attr-inp" value="{{$agent->strength}}" onchange="statsTotal(), D20str()" onkeyup="statsTotal(), D20str()" type="number" min="-25" max="25" value="1" id="strength" name="strength" title="Strength">
                    <span class="attr int-s">Intelligence</span>
                    <input required="" class="attr int attr-inp" value="{{$agent->intelligence}}" onchange="statsTotal(), D20int()" onkeyup="statsTotal(), D20int()" type="number" min="-25" max="25" value="1" id="intelligence" name="intelligence" title="Intelligence">
                    <span class="attr pre-s">Presence</span>
                    <input required="" class="attr pre attr-inp" value="{{$agent->presence}}" onchange="statsTotal(), D20pre()" onkeyup="statsTotal(), D20pre()" type="number" min="-25" max="25" value="1" id="presence" name="presence" title="Presence">
                    <span class="attr vig-s">Vigor</span>
                    <input required="" class="attr vig attr-inp" value="{{$agent->vigor}}" onchange="statsTotal(), D20vig()" onkeyup="statsTotal(), D20vig()" type="number" min="-25" max="25" value="1" id="vigor" name="vigor" title="Vigor">
                    <img src="{{ asset('img/pentagrama.png') }}" alt="pentagram">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-6 col-sm-2">
                        <label class="life base-labels">Life <i class="fa-solid fa-plus"></i></label>
                        <label class="life altered-labels"><i class="fa-solid fa-plus"></i></label>
                        <div class="form-group">
                            <input name="lp" type="text" value="{{$agent->lp}}" id="life" class="input_atk input_atk-top">
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
                            <input name="sp" type="text" id="san" value="{{$agent->sp}}" class="input_atk input_atk-top">
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
                            <input name="ep" type="text" id="effort" value="{{$agent->ep}}" class="input_atk input_atk-top">
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
                            <input name="mov_meters" value="{{$agent->mov_meters}}" type="text" class="input_atk input_atk-top" placeholder="9m">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-6 col-sm-3">
                        <label class="base-labels">Base Defense</label>
                        <label class="altered-labels">Defense</label>
                        <div class="form-group">
                            <input name="defense" id="baseDef" value="{{$agent->defense}}" onclick="baseDefense()" type="text" class="input_atk input_atk-top">
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
                            <textarea name="proficiencies" id="prof" class="input_atk input_atk-top" cols="30" rows="4">{{$agent->proficiencies}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-6">
                <label>Patent</label>
                <div class="form-group">
                    <select class="input_atk input_atk-top input_sel" onchange="patentChange()" id="patent" name="patent">
                        <option {{$agent->patent == '0' ? "selected" : ""}} value="0">Recruit</option>
                        <option {{$agent->patent == '1' ? "selected" : ""}} value="1">Operator</option>
                        <option {{$agent->patent == '2' ? "selected" : ""}} value="2">Special Agent</option>
                        <option {{$agent->patent == '3' ? "selected" : ""}} value="3">Operation Official</option>
                        <option {{$agent->patent == '4' ? "selected" : ""}} value="4">Elite Agent</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-6">
                <label>Protection</label>
                <div class="form-group">
                    <select class="input_atk input_atk-top input_sel" onchange="baseDefense()" id="prot" name="protection">
                        <option {{$agent->protection == '0' ? "selected" : ""}} value="0">None</option>
                        <option {{$agent->protection == '1' ? "selected" : ""}} value="1">Light</option>
                        <option {{$agent->protection == '2' ? "selected" : ""}} value="2">Heavy</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-12 padFix">
                <label>Resistances</label>
                <div class="form-group">
                    <input type="text" class="input_atk input_atk-top" value="{{$agent->resistances}}" name="resistances">
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 exp-box fix">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <label class="label-e">Expertise <i class="fa-regular fa-square-check box-icon"></i></label>
                    </div>
                    @foreach ($expertise as $exp)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-2 col-xl-2 exp">
                        <label class="attr-{{$exp->attribute_used}}"></label>
                        <i class="fa-solid fa-dice-d20 d20"></i> + <span id="{{$exp->expertise}}T">0</span> +
                        <input type="text" name="{{strtolower($exp->expertise)}}_ex" value="{{ $agent->{strtolower($exp->expertise) . '_ex'} }}" class="extra"> <br>
                        {{$exp->expertise}} <br>
                        <select class="exp-selector" onchange="expertisePoints()" name="{{ strtolower($exp->expertise) }}" id="{{$exp->expertise}}">
                            <option {{$agent->{strtolower($exp->expertise)} == '0' ? "selected" : ""}} value="0">Untrained</option>
                            <option {{$agent->{strtolower($exp->expertise)} == '1' ? "selected" : ""}} value="1">Trained</option>
                            <option {{$agent->{strtolower($exp->expertise)} == '2' ? "selected" : ""}} value="2">Veteran</option>
                            <option {{$agent->{strtolower($exp->expertise)} == '3' ? "selected" : ""}} value="3">Expert</option>
                        </select>
                    </div>
                    @endforeach
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-start">
                        <i class="fa-solid fa-triangle-exclamation warning"></i> You have <span id="expertisePoints"></span> expertise points to use<span id="expertiseObligated"></span> <i class="fa-solid fa-triangle-exclamation warning"></i>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 exp-box">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <label class="label-e">Attacks <i class="fa-solid fa-thumbtack box-icon"></i></label>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-xs-3 col-lg-3 col-md-3 col-sm-4 col-4 attack-box">
                                Weapon
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-4 col-4 attack-box">
                                Test
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-4 col-4 attack-box">
                                Damage
                            </div>
                            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-11 col-11 attack-box">
                                Critical/Range/Special
                            </div>
                            <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1 col-1 text-center attack-box">
                                <a onclick="addAtack()"><i class="fa-solid fa-plus add-attack"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div id="attackDiv" class="row">
                            @foreach ($attack as $atk)
                                @if ($atk->weapon != null)
                                    <div class="col-xs-3 col-lg-3 col-md-3 col-sm-4 col-4">
                                        <input type="text" value="{{$atk->weapon}}" name="weapon[]" class="input_atk">
                                        <input type="text" value="{{$atk->id}}" hidden name="id_atk[]">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-4 col-4">
                                        <input type="text" value="{{$atk->test}}" name="test[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-4 col-4">
                                        <input type="text" value="{{$atk->damage}}" name="damage[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-4 col-lg-4 col-md-4 col-sm-10 col-10">
                                        <input type="text" value="{{$atk->special}}" name="special[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-1 col-lg-1 col-md-1 col-sm-2 col-2 text-center">
                                        <a href="/agents/deleteatk/{{$atk->id}}" class="input_atk discard-b"><i class="fa-solid fa-trash discard-i"></i></a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 exp-box">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <label class="label-e">Skills and Rituals <i class="fa-solid fa-book box-icon"></i></label>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-xs-3 col-lg-3 col-md-3 col-sm-6 col-6 attack-box">
                                Name
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-3 col-3 attack-box">
                                Cost
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-3 col-3 attack-box">
                                Page
                            </div>
                            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-11 col-11 attack-box">
                                (Short) Description
                            </div>
                            <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1 col-1 text-center attack-box">
                                <a onclick="addRitual()"><i class="fa-solid fa-plus add-attack"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div id="skillsDiv" class="row">
                            @foreach ($SkillsRitual as $sr)
                                @if ($sr->skill_name != null)
                                    <div class="col-xs-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                        <input type="text" value="{{$sr->skill_name}}" name="skill_name[]" class="input_atk">
                                        <input type="text" value="{{$sr->id}}" hidden name="id_sr[]">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-3 col-3">
                                        <input type="text" value="{{$sr->cost}}" name="cost[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-3 col-3">
                                        <input type="text" value="{{$sr->page}}" name="page[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-4 col-lg-4 col-md-4 col-sm-10 col-10">
                                        <input type="text" value="{{$sr->description}}" name="description[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-1 col-lg-1 col-md-1 col-sm-2 col-2 text-center">
                                        <a href="/agents/deletesr/{{$sr->id}}" class="input_atk discard-b"><i class="fa-solid fa-trash discard-i"></i></a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 exp-box fix">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <label class="label-e">Inventory <i class="fa-solid fa-box box-icon"></i></label>
                    </div>
                    <label>Item limit</label>
                    <div class="col-3 col-sm-3 col-md-3 col-lg-1 col-xl-1">
                        <label class="label2">I</label>
                        <input type="text" id="cat1" class="input_atk text-center" placeholder="I">
                    </div>

                    <div class="col-3 col-sm-3 col-md-3 col-lg-1 col-xl-1">
                        <label class="label2">II</label>
                        <input type="text" id="cat2" class="input_atk text-center" placeholder="II">
                    </div>

                    <div class="col-3 col-sm-3 col-md-3 col-lg-1 col-xl-1">
                        <label class="label2">III</label>
                        <input type="text" id="cat3" class="input_atk text-center" placeholder="III">
                    </div>

                    <div class="col-3 col-sm-3 col-md-3 col-lg-1 col-xl-1">
                        <label class="label2">IV</label>
                        <input type="text" id="cat4" class="input_atk text-center" placeholder="IV">
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-5 col-xl-2">
                        <label class="label2">Credit limit</label>
                        <div class="form-group">
                            <input id="credLim" class="input_atk" type="text">
                        </div>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-3 col-xl-2">
                        <label class="label2">Weight limit</label>
                        <div class="text-end">
                            <input type="text" id="wgtLim" class="input_atk text-center">
                        </div>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <label class="label2">Current Weight</label>
                        <div class="text-end">
                            <input type="text" id="currWgt" value="{{$agent->currWgt}}" name="currWgt" class="input_atk text-center">
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 attack-box">
                                Item
                            </div>
                            <div class="col-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 attack-box">
                                Category
                            </div>
                            <div class="col-5 col-sm-5 col-md-2 col-lg-2 col-xl-2 attack-box">
                                Weight
                            </div>
                            <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1 col-1 text-center attack-box">
                                <a onclick="addItem()"><i class="fa-solid fa-plus add-attack"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div id="itemsDiv" class="row">
                            @foreach ($inventory as $inv)
                                @if ($inv->item != null)
                                    <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                                        <input type="text" value="{{$inv->item}}" name="item[]" class="input_atk">
                                        <input type="text" value="{{$inv->id}}" hidden name="id_inv[]">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-6 col-6">
                                        <input type="text" value="{{$inv->category}}" name="category[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-4 col-4">
                                        <input type="text" value="{{$inv->weight}}" name="weight[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-1 col-lg-1 col-md-1 col-sm-2 col-2 text-center">
                                        <a href="/agents/deleteinv/{{$inv->id}}" class="input_atk discard-b"><i class="fa-solid fa-trash discard-i"></i></a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 exp-box fix" style="display: none;" id="paranormal">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <label class="label-e">Paranormal <i class="fa-regular fa-eye box-icon"></i></label>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
                        <label>Main Element</label>
                        <div class="form-group">
                            <select name="element" class="input_atk input_atk-top input_sel">
                                <option {{$agent->element == 0 ? "selected" : ""}} value="0">None</option>
                                @foreach ($element as $e)
                                    @if ($e->id <= 4)
                                        <option {{$agent->element == $e->id ? "selected" : ""}} value="{{$e->id}}">{{$e->element}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 exp-box">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <label class="label-e">Config <i class="fa-solid fa-gear box-icon"></i></label>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4">
                        <label>Hide this agent from your profile?</label>
                        <div class="form-group">
                            <select name="private" class="input_atk input_atk-top input_sel">
                                <option {{$agent->private == 0 ? "selected" : ""}} value="0">Yes</option>
                                <option {{$agent->private == 1 ? "selected" : ""}} value="1">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-end">
                        <a href="/agents/deleteagent/{{$agent->id}}" class="custom-link">Delete Agent?</a>
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
