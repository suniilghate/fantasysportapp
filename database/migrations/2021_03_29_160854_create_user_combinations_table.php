<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     * id, user_id, match_id, team1_player_id, team2_player_id, player_type, status
     * @return void
     */
    public function up()
    {
        Schema::create('user_combinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('match_id');
            $table->integer('team1_player_id');
            $table->integer('team2_player_id');
            $table->tinyinteger('player_type')->default(0);
            $table->tinyinteger('status')->default(1)->comment('1:Active | 2:Deactive');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_combinations');
    }
}
