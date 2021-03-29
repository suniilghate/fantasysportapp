<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('match_results', function (Blueprint $table) {
            $table->id();
            $table->integer('match_id');
            $table->integer('team1_id');
            $table->integer('team2_id');
            $table->integer('team1_runs_scored');
            $table->integer('team1_wickets_falled');
            $table->integer('team2_runs_scored');
            $table->integer('team2_wickets_falled');
            $table->integer('team1_result');
            $table->integer('team2_result');
            $table->tinyinteger('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('match_results');
    }
}
