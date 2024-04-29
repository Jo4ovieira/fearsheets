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
    ];
}
