<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Attack;
use App\Models\SkillsRitual;
use App\Models\Inventory;
use App\Models\Expertise;
use App\Models\Nex;
use App\Models\Element;
use App\Models\ClassType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isNull;

class AgentsController extends Controller
{
    public function index(Request $r) {
        $agent = Agent::all();

        $nex = Nex::all();

        $class = ClassType::all();

        return view('agent.index', compact(['agent', 'nex', 'class']));
    }
    public function add(Request $r) {
        $expertise = Expertise::All();

        $nex = Nex::all();

        $class = ClassType::all();

        $element = Element::all();

        return view('agent.add', compact(['expertise', 'nex', 'class', 'element']));
    }
    public function addAgent(Request $r) {
        $r->validate([
            'agent_name' => 'required',
            'origin' => 'required',
            'lp' => 'required',
            'sp' => 'required',
            'ep' => 'required',
            'mov_meters' => 'required',
            'proficiencies' => 'required',
        ]);

        $post = DB::transaction(function () use ($r) {
            $data = $r->post();

            $post = Agent::create($data);

            return $post;
        });

        return redirect(route('updateAgent', ['id' => $post->id]));
    }

    public function update(Request $r) {
        $post = Agent::find($r->id);

        $exp = Expertise::All();

        $id = $r->id;

        $nex = Nex::all();

        $class = ClassType::all();

        $element = Element::all();

        $attack = Attack::where('agent_id', $id)->get(['id', 'weapon', 'test', 'damage', 'special']);
        $SkillsRitual = SkillsRitual::where('agent_id', $id)->get(['id', 'skill_name', 'cost', 'page', 'description']);
        $inventory = Inventory::where('agent_id', $id)->get(['id', 'item', 'category', 'weight']);

        return view('agent.update', ['class' => $class, 'nex' => $nex, 'agent' => $post, 'expertise' => $exp, 'id' => $id, 'attack' => $attack, 'SkillsRitual' => $SkillsRitual, 'inventory' => $inventory, 'element' => $element]);
    }

    public function updateAgent(Request $r) {
        $r->validate([
            'agent_name' => 'required',
            'origin' => 'required',
            'lp' => 'required',
            'sp' => 'required',
            'ep' => 'required',
            'mov_meters' => 'required',
            'defense' => 'required',
            'proficiencies' => 'required',
        ]);

        $keys = array_keys($r->except(['_token']));

        $i = 0;

        DB::transaction(function () use ($r, $i, $keys) {
            foreach($keys as $value) {
                if($value != "weapon" & $value != "test" & $value != "damage" & $value != "special" & $value != "skill_name" & $value != "cost" & $value != "page" & $value != "description" & $value != "item" & $value != "category" & $value != "weight" & $value != "id_atk" & $value != "id_sr" & $value != "id_inv"){
                    Agent::where('id', $r->id)->update([$value => $r->$value]);
                }
            }

            // Attack insert
            if($r->weapon != null) {
                foreach($r->weapon as $wpn) {
                    if($wpn != "" && $r->id_atk[$i] == "add"){

                        $data = [
                            'agent_id' => $r->id,
                            'weapon' => $r->weapon[$i],
                            'test' => $r->test[$i],
                            'damage' => $r->damage[$i],
                            'special' => $r->special[$i]
                        ];

                        $post = Attack::create($data);

                        $i++;
                    } elseif($wpn != "" && $r->id_atk[$i] != "add") {

                        Attack::where('id', $r->id_atk[$i])->update(['weapon' => $r->weapon[$i]]);
                        Attack::where('id', $r->id_atk[$i])->update(['test' => $r->test[$i]]);
                        Attack::where('id', $r->id_atk[$i])->update(['damage' => $r->damage[$i]]);
                        Attack::where('id', $r->id_atk[$i])->update(['special' => $r->special[$i]]);

                        $i++;
                    } else {
                        $i++;
                    }
                }
            }

            $i = 0;

            // Skills & Rituals insert
            if($r->skill_name != null) {
                foreach($r->skill_name as $sn) {
                    if($sn != "" & $r->id_sr[$i] == "add" ){

                        $data = [
                            'agent_id' => $r->id,
                            'skill_name' => $r->skill_name[$i],
                            'cost' => $r->cost[$i],
                            'page' => $r->page[$i],
                            'description' => $r->description[$i]
                        ];

                        $post = SkillsRitual::create($data);

                        $i++;
                    } elseif($sn != "" & $r->id_sr[$i] != "add") {

                        SkillsRitual::where('id', $r->id_sr[$i])->update(['skill_name' => $r->skill_name[$i]]);
                        SkillsRitual::where('id', $r->id_sr[$i])->update(['cost' => $r->cost[$i]]);
                        SkillsRitual::where('id', $r->id_sr[$i])->update(['page' => $r->page[$i]]);
                        SkillsRitual::where('id', $r->id_sr[$i])->update(['description' => $r->description[$i]]);

                        $i++;
                    } else {
                        $i++;
                    }
                }
            }

            $i = 0;

            // Inventory insert
            if($r->item != null) {
                foreach($r->item as $itm) {
                    if($itm != "" & $r->id_inv[$i] == "add" ){

                        if($r->item[$i] == "") {
                            $item = "";
                        } else {
                            $item = $r->item[$i];
                        };

                        $data = [
                            'agent_id' => $r->id,
                            'item' => $r->item[$i],
                            'category' => $r->category[$i],
                            'weight' => $r->weight[$i],
                        ];

                        $post = Inventory::create($data);

                        $i++;
                    } elseif($itm != "" & $r->id_inv[$i] != "add") {

                        Inventory::where('id', $r->id_inv[$i])->update(['item' => $r->item[$i]]);
                        Inventory::where('id', $r->id_inv[$i])->update(['category' => $r->category[$i]]);
                        Inventory::where('id', $r->id_inv[$i])->update(['weight' => $r->weight[$i]]);

                        $i++;
                    } else {
                        $i++;
                    }
                }
            }
        });

        return redirect(route('updateAgent', ['id' => $r->id]));
    }

    public function deleteAgent(Request $r) {
        $post = Agent::find($r->id);

        DB::transaction(function () use ($r, $post) {
            if($post){ // -----> Só o post já serve de validação de existencia, pq ele já buscou e retornou se tem ou nao (Bool)
                $post->delete();
            } else {
                return redirect(route('updateAgent', ['id' => $r->id]));
            }
        });

        return redirect(route('agent'));
    }

    public function deleteAtk(Request $r) {
        $idA = Attack::where('id', $r->id)->get('agent_id');

        $post = Attack::find($r->id);

        DB::transaction(function () use ($r, $idA, $post) {
            if($post){ // -----> Só o post já serve de validação de existencia, pq ele já buscou e retornou se tem ou nao (Bool)
                $post->delete();
            } else {
                return redirect(route('updateAgent', ['id' => $idA[0]->agent_id]));
            }
        });

        return redirect(route('updateAgent', ['id' => $idA[0]->agent_id]));
    }

    public function deleteSr(Request $r) {
        $idA = SkillsRitual::where('id', $r->id)->get('agent_id');

        $post = SkillsRitual::find($r->id);

        DB::transaction(function () use ($r, $idA, $post) {
            if($post){ // -----> Só o post já serve de validação de existencia, pq ele já buscou e retornou se tem ou nao (Bool)
                $post->delete();
            } else {
                return redirect(route('updateAgent', ['id' => $idA[0]->agent_id]));
            }
        });

        return redirect(route('updateAgent', ['id' => $idA[0]->agent_id]));
    }

    public function deleteInv(Request $r) {
        $idA = Inventory::where('id', $r->id)->get('agent_id');

        $post = Inventory::find($r->id);

        DB::transaction(function () use ($r, $idA, $post) {
            if($post){ // -----> Só o post já serve de validação de existencia, pq ele já buscou e retornou se tem ou nao (Bool)
                $post->delete();
            } else {
                return redirect(route('updateAgent', ['id' => $idA[0]->agent_id]));
            }
        });

        return redirect(route('updateAgent', ['id' => $idA[0]->agent_id]));
    }
}
