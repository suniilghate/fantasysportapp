<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserContestsTable extends Migration
{
    /**
     * Run the migrations.
     * id, user_id, contest_id, combinaiton_id, result, wining_amount, lossing_amount, status
     * @return void
     */
    public function up()
    {
        Schema::create('user_contests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('contest_id');
            $table->integer('combination_id');
            $table->tinyinteger('result')->default(0)->comment('1:Win | 2:Lost');
            $table->float('amount');
            $table->tinyinteger('status')->default(0)->comment('1:Active | 2:Deactivate | 3: Contest Cancelled | 4: Amount Refund');
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
        Schema::dropIfExists('user_contests');
    }
}
