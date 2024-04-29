@extends('components.layout')

@section('content')

<div class="container">
    <form method="POST" action="{{route('agent.editAgent_action')}}">
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
            <div class="col-xs-6 col-lg-6 col-sm-6 col-md-6 col-6">
                <label>Agent name</label>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{$agent->agent_name}}" name="agent_name" placeholder="Maquimbo Mcoy...">
                </div>
            </div>
            <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1 col-1">
                <label>Nex</label>
                <div class="form-group">
                    <select name="nex" onchange="statsTotal()" class="form-select" id="nex">
                        <option {{$agent->nex == '0' ? "selected" : ""}} value="0">5%</option>
                        <option {{$agent->nex == '1' ? "selected" : ""}} value="1">10%</option>
                        <option {{$agent->nex == '2' ? "selected" : ""}} value="2">15%</option>
                        <option {{$agent->nex == '3' ? "selected" : ""}} value="3">20%</option>
                        <option {{$agent->nex == '4' ? "selected" : ""}} value="4">25%</option>
                        <option {{$agent->nex == '5' ? "selected" : ""}} value="5">30%</option>
                        <option {{$agent->nex == '6' ? "selected" : ""}} value="6">35%</option>
                        <option {{$agent->nex == '7' ? "selected" : ""}} value="7">40%</option>
                        <option {{$agent->nex == '8' ? "selected" : ""}} value="8">45%</option>
                        <option {{$agent->nex == '9' ? "selected" : ""}} value="9">50%</option>
                        <option {{$agent->nex == '10' ? "selected" : ""}} value="10">55%</option>
                        <option {{$agent->nex == '11' ? "selected" : ""}} value="11">60%</option>
                        <option {{$agent->nex == '12' ? "selected" : ""}} value="12">65%</option>
                        <option {{$agent->nex == '13' ? "selected" : ""}} value="13">70%</option>
                        <option {{$agent->nex == '14' ? "selected" : ""}} value="14">75%</option>
                        <option {{$agent->nex == '15' ? "selected" : ""}} value="15">80%</option>
                        <option {{$agent->nex == '16' ? "selected" : ""}} value="16">85%</option>
                        <option {{$agent->nex == '17' ? "selected" : ""}} value="17">90%</option>
                        <option {{$agent->nex == '18' ? "selected" : ""}} value="18">95%</option>
                        <option {{$agent->nex == '19' ? "selected" : ""}} value="19">99%</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                <label>Class</label>
                <div class="form-group">
                    <select name="class" onchange="statsTotal()" class="form-select" id="class">
                        <option {{$agent->class == '0' ? "selected" : ""}} value="0">Other</option>
                        <option {{$agent->class == '1' ? "selected" : ""}} value="1">Combatant</option>
                        <option {{$agent->class == '2' ? "selected" : ""}} value="2">Specialist</option>
                        <option {{$agent->class == '3' ? "selected" : ""}} value="3">Occultist</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 col-3">
                <label>Origin</label>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{$agent->origin}}" name="origin" id="origin" placeholder="Fighter...">
                </div>
            </div>
            <div class="col-xs-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="container-a">
                    <span class="attr agi-s">Agility</span>
                    <input required="" class="attr agi attr-inp" value="{{$agent->agility}}" onclick="baseDefense()" onchange="baseDefense()" onkeyup="baseDefense()" type="number" min="-25" max="25" value="1" id="agility" name="agility" title="Agility">
                    <span class="attr str-s">Strength</span>
                    <input required="" class="attr str attr-inp" value="{{$agent->strength}}" onchange="statsTotal()" onkeyup="statsTotal()" type="number" min="-25" max="25" value="1" id="strength" name="strength" title="Strength">
                    <span class="attr int-s">Intelligence</span>
                    <input required="" class="attr int attr-inp" value="{{$agent->intelligence}}" onchange="statsTotal()" onkeyup="statsTotal()" type="number" min="-25" max="25" value="1" id="intelligence" name="intelligence" title="Intelligence">
                    <span class="attr pre-s">Presence</span>
                    <input required="" class="attr pre attr-inp" value="{{$agent->presence}}" onchange="statsTotal()" onkeyup="statsTotal()" type="number" min="-25" max="25" value="1" id="presence" name="presence" title="Presence">
                    <span class="attr vig-s">Vigor</span>
                    <input required="" class="attr vig attr-inp" value="{{$agent->vigor}}" onchange="statsTotal()" onkeyup="statsTotal()" type="number" min="-25" max="25" value="1" id="vigor" name="vigor" title="Vigor">
                    <img src="{{ asset('img/pentagrama.png') }}" alt="pentagram">
                </div>
            </div>
            <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-2 col-sm-2">
                        <label class="life">Life <i class="fa-solid fa-plus"></i></label>
                        <div class="form-group">
                            <input name="lp" type="text" value="{{$agent->lp}}" id="life" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 col-sm-2">
                        <div class="form-group" style="margin-top: 20px;">
                            <li class="life">Lp per nex: <span id="lpNex"></span></li>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 col-sm-2">
                        <label class="san">Sanity <i class="fa-solid fa-brain"></i></label>
                        <div class="form-group">
                            <input name="sp" type="text" id="san" value="{{$agent->sp}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 col-sm-2">
                        <div class="form-group" style="margin-top: 20px;">
                            <li class="san">San per nex: <span id="sanNex"></span></li>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 col-sm-2">
                        <label class="effort">Effort <i class="fa-solid fa-bolt"></i></label>
                        <div>
                            <input name="ep" type="text" id="effort" value="{{$agent->ep}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 col-sm-2">
                        <div class="form-group" style="margin-top: 20px;">
                            <li class="effort">Ep per nex: <span id="effNex"></span></li>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6 col-sm-6">
                        <label>Movement by meters</label>
                        <div class="form-group">
                            <input name="mov_meters" value="{{$agent->mov_meters}}" type="text" class="form-control" placeholder="9m">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-3 col-sm-3">
                        <label>Base Defense</label>
                        <div class="form-group">
                            <input name="defense" id="baseDef" value="{{$agent->defense}}" onclick="baseDefense()" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-3 col-sm-3">
                        <div class="form-group" style="margin-top: 20px;">
                            <li>10 + <span id="defAgi">Agi</span> + <span id="pt">Protection</span></li>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <label>Proficiencies</label>
                        <div class="form-group">
                            <textarea name="proficiencies" id="prof" class="form-control" cols="30" rows="4">{{$agent->proficiencies}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <label>Patent</label>
                <div class="form-controll">
                    <select class="form-select" onchange="patentChange()" id="patent" name="patent">
                        <option {{$agent->patent == '0' ? "selected" : ""}} value="0">Recruit</option>
                        <option {{$agent->patent == '1' ? "selected" : ""}} value="1">Operator</option>
                        <option {{$agent->patent == '2' ? "selected" : ""}} value="2">Special Agent</option>
                        <option {{$agent->patent == '3' ? "selected" : ""}} value="3">Operation Official</option>
                        <option {{$agent->patent == '4' ? "selected" : ""}} value="4">Elite Agent</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-4">
                <label>Protection</label>
                <div class="form-controll">
                    <select class="form-select" onchange="baseDefense()" id="prot" name="protection">
                        <option {{$agent->protection == '0' ? "selected" : ""}} value="0">None</option>
                        <option {{$agent->protection == '1' ? "selected" : ""}} value="1">Light</option>
                        <option {{$agent->protection == '2' ? "selected" : ""}} value="2">Heavy</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-4 padFix">
                <label>Resistances</label>
                <div class="form-controll">
                    <input type="text" class="form-control" value="{{$agent->resistances}}" name="resistances">
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 exp-box">
                <div class="row">
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                        <label class="label-e">Expertise <i class="fa-solid afa-square-check box-icon"></i></label>
                    </div>
                    @foreach ($expertise as $exp)
                    <div class="col-lg-2 exp">
                        <i class="fa-solid fa-dice-d20 d20"></i> + <span id="{{$exp->expertise}}T">0</span> <br>
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
                            <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 col-3 attack-box">
                                Weapon
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2 attack-box">
                                Test
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2 attack-box">
                                Damage
                            </div>
                            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-4 attack-box">
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
                                    <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                        <input type="text" value="{{$atk->weapon}}" name="weapon[]" class="input_atk">
                                        <input type="text" value="{{$atk->id}}" hidden name="id_atk[]">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <input type="text" value="{{$atk->test}}" name="test[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <input type="text" value="{{$atk->damage}}" name="damage[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <input type="text" value="{{$atk->special}}" name="special[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1 col-1 text-center">
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
                            <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 col-3 attack-box">
                                Name
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2 attack-box">
                                Cost
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2 attack-box">
                                Page
                            </div>
                            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-4 attack-box">
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
                                    <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                        <input type="text" value="{{$sr->skill_name}}" name="skill_name[]" class="input_atk">
                                        <input type="text" value="{{$sr->id}}" hidden name="id_sr[]">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <input type="text" value="{{$sr->cost}}" name="cost[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <input type="text" value="{{$sr->page}}" name="page[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4 col-4">
                                        <input type="text" value="{{$sr->description}}" name="description[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1 col-1 text-center">
                                        <a href="/agents/deletesr/{{$sr->id}}" class="input_atk discard-b"><i class="fa-solid fa-trash discard-i"></i></a>
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
                        <label class="label-e">Inventory <i class="fa-solid fa-box box-icon"></i></label>
                    </div>
                    <label>Item limit</label>
                    <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="row">
                            <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <label class="label2">I</label>
                                <input type="text" id="cat1" class="input_atk text-center" placeholder="I">
                            </div>

                            <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <label class="label2">II</label>
                                <input type="text" id="cat2" class="input_atk text-center" placeholder="II">
                            </div>

                            <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <label class="label2">III</label>
                                <input type="text" id="cat3" class="input_atk text-center" placeholder="III">
                            </div>

                            <div class="col-xs-3 col-lg-3 col-md-3 col-sm-3 col-3">
                                <label class="label2">IV</label>
                                <input type="text" id="cat4" class="input_atk text-center" placeholder="IV">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                        <label class="label2">Credit limit</label>
                        <div class="form-group">
                            <input id="credLim" class="input_atk" type="text">
                        </div>
                    </div>
                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                        <label class="label2">Weight limit</label>
                        <div class="text-end">
                            <input type="text" id="wgtLim" class="input_atk text-center">
                        </div>
                    </div>
                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                        <label class="label2">Current Weight</label>
                        <div class="text-end">
                            <input type="text" id="currWgt" value="{{$agent->currWgt}}" name="currWgt" class="input_atk text-center">
                        </div>
                    </div>
                    <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-xs-7 col-lg-7 col-md-7 col-sm-7 col-7 attack-box">
                                Item
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-4 col-sm-2 col-2 attack-box">
                                Category
                            </div>
                            <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2 attack-box">
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
                                    <div class="col-xs-7 col-lg-7 col-md-7 col-sm-7 col-7">
                                        <input type="text" value="{{$inv->item}}" name="item[]" class="input_atk">
                                        <input type="text" value="{{$inv->id}}" hidden name="id_inv[]">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <input type="text" value="{{$inv->category}}" name="category[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-2 col-lg-2 col-md-2 col-sm-2 col-2">
                                        <input type="text" value="{{$inv->weight}}" name="weight[]" class="input_atk">
                                    </div>
                                    <div class="col-xs-1 col-lg-1 col-md-1 col-sm-1 col-1 text-center">
                                        <a href="/agents/deleteinv/{{$inv->id}}" class="input_atk discard-b"><i class="fa-solid fa-trash discard-i"></i></a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12 col-12 text-start fix">
                <button class="btn-add" title="register_action">Register</button>
            </div>
        </div>
    </form>
</div>

@endsection
