<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attack extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'weapon',
        'test',
        'damage',
        'special',
    ];

    public $timestamps = false;
}
