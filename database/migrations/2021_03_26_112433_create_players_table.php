<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('sport_id');
            $table->integer('age');
            $table->tinyinteger('gender_id');
            $table->tinyinteger('type');
            $table->tinyinteger('status')->default(1)->comment('1:Active | 2:Series declared | 3:Playing 11 | 4:Substitute | 5:Retired | 6:Deactive');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('players');
    }
}
