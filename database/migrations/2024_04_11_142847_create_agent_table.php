<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agent', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->timestamps();
            $table->string('agent_name');
            $table->integer('nex');
            $table->integer('class');
            $table->string('origin');
            $table->integer('agility');
            $table->integer('strength');
            $table->integer('intelligence');
            $table->integer('presence');
            $table->integer('vigor');
            $table->integer('lp');
            $table->integer('sp');
            $table->integer('ep');
            $table->string('mov_meters');
            $table->integer('defense');
            $table->string('proficiencies');
            $table->integer('patent');
            $table->integer('protection');
            $table->string('resistances');
            $table->integer('acrobatics');
            $table->integer('taming');
            $table->integer('arts');
            $table->integer('athletics');
            $table->integer('knowledge');
            $table->integer('science');
            $table->integer('thievery');
            $table->integer('diplomacy');
            $table->integer('bluff');
            $table->integer('fortitude');
            $table->integer('stealth');
            $table->integer('initiative');
            $table->integer('intimidation');
            $table->integer('intuition');
            $table->integer('investigation');
            $table->integer('fight');
            $table->integer('medicine');
            $table->integer('occultism');
            $table->integer('perception');
            $table->integer('piloting');
            $table->integer('aim');
            $table->integer('profession');
            $table->integer('reflex');
            $table->integer('religion');
            $table->integer('survival');
            $table->integer('tactic');
            $table->integer('technology');
            $table->integer('will');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agent');
    }
};
