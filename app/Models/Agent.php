<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'agent_name',
        'nex',
        'class',
        'origin',
        'agility',
        'strength',
        'intelligence',
        'presence',
        'vigor',
        'lp',
        'sp',
        'ep',
        'mov_meters',
        'defense',
        'proficiencies',
        'patent',
        'protection',
        'acrobatics',
        'taming',
        'arts',
        'athletics',
        'knowledge',
        'science',
        'thievery',
        'diplomacy',
        'bluff',
        'fortitude',
        'stealth',
        'initiative',
        'intimidation',
        'intuition',
        'investigation',
        'fight',
        'medicine',
        'occultism',
        'perception',
        'piloting',
        'aim',
        'profession',
        'reflex',
        'religion',
        'survival',
        'tactic',
        'technology',
        'will',
        'currWgt',
        'private',
        'acrobatics_ex',
        'taming_ex',
        'arts_ex',
        'athletics_ex',
        'knowledge_ex',
        'science_ex',
        'thievery_ex',
        'diplomacy_ex',
        'bluff_ex',
        'fortitude_ex',
        'stealth_ex',
        'initiative_ex',
        'intimidation_ex',
        'intuition_ex',
        'investigation_ex',
        'fight_ex',
        'medicine_ex',
        'occultism_ex',
        'perception_ex',
        'aim_ex',
        'profession_ex',
        'piloting_ex',
        'reflex_ex',
        'religion_ex',
        'survival_ex',
        'tactic_ex',
        'technology_ex',
        'will_ex',
    ];
}
