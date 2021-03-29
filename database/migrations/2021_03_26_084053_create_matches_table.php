<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('series_id');
            $table->integer('team1');
            $table->integer('team2');
            $table->date('date');
            $table->tinyinteger('status')->default(1)->comment('1:Active | 2:Pools Opened | 3:Match-Inplay | 4:Ist Inning finish | 5:IInd Inning finish | 6:Match Completed | 7:Match Closed | 8:Calculations starts | 9:Match Results declared | 10:Match Cancelled| 11:Match Abondend | 12:Match postponed | 13:Match stopped');
            $table->tinyinteger('result')->default(1);
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
        Schema::drop('matches');
    }
}
