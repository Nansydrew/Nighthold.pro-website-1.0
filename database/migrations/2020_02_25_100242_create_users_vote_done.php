<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersVoteDone extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_vote_done', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('name')->nullable();
            $table->bigInteger('vote_id')->nullable();
            $table->bigInteger('complete')->nullable();
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
        Schema::dropIfExists('users_vote_done');
    }
}
