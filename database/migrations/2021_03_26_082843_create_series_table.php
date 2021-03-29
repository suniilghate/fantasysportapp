<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('sport_id');
            $table->date('start_date');
            $table->date('end_date');
            $table->tinyInteger('status')->default(1)->comment('1:Active | 2:Pools Opened | 3:Match-Inplay | 4:Match finish | 5: Series Cancelled | 6: Series Over | 7:Deactive');
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
        Schema::drop('series');
    }
}
