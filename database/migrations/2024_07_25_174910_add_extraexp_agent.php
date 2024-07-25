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
        Schema::table('agents', function($table){
            $table->string('acrobatics_ex', 10)->nullable();
            $table->string('taming_ex', 10)->nullable();
            $table->string('arts_ex', 10)->nullable();
            $table->string('athletics_ex', 10)->nullable();
            $table->string('knowledge_ex', 10)->nullable();
            $table->string('science_ex', 10)->nullable();
            $table->string('thievery_ex', 10)->nullable();
            $table->string('diplomacy_ex', 10)->nullable();
            $table->string('bluff_ex', 10)->nullable();
            $table->string('fortitude_ex', 10)->nullable();
            $table->string('stealth_ex', 10)->nullable();
            $table->string('initiative_ex', 10)->nullable();
            $table->string('intimidation_ex', 10)->nullable();
            $table->string('intuition_ex', 10)->nullable();
            $table->string('investigation_ex', 10)->nullable();
            $table->string('fight_ex', 10)->nullable();
            $table->string('medicine_ex', 10)->nullable();
            $table->string('occultism_ex', 10)->nullable();
            $table->string('perception_ex', 10)->nullable();
            $table->string('aim_ex', 10)->nullable();
            $table->string('piloting_ex', 10)->nullable();
            $table->string('profession_ex', 10)->nullable();
            $table->string('reflex_ex', 10)->nullable();
            $table->string('religion_ex', 10)->nullable();
            $table->string('survival_ex', 10)->nullable();
            $table->string('tactic_ex', 10)->nullable();
            $table->string('technology_ex', 10)->nullable();
            $table->string('will_ex', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
