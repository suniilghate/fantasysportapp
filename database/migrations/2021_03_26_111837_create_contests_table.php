<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContestsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyinteger('contest_type');
            $table->integer('match_id');
            $table->float('wining_amount');
            $table->float('entry_fee');
            $table->float('total_amount');
            $table->integer('contest_total_users');
            $table->tinyinteger('status')->default(1)->comment('1:Active | 2:Pools Opened | 3:Match-Inplay | 4:Ist Inning finish | 5:IInd Inning finish | 6: Calculation In-progress | 7: Pools Closed | 8:Deactive');
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
        Schema::drop('contests');
    }
}
