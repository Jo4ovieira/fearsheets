<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillsRitual extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'skill_name',
        'cost',
        'page',
        'description',
    ];

    public $timestamps = false;
}
