<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChannelCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->tinyInteger('parent_id')->nullable();
            $table->string('slug')->default(NULL);
            $table->tinyInteger('user_id')->nullable();
            $table->tinyInteger('channel_id')->nullable();
            $table->tinyInteger('replies_count')->default('0');
            $table->tinyInteger('up')->default('0');
            $table->tinyInteger('down')->default('0');
            $table->string('title')->default(NULL);
            $table->text('body')->default(NULL);
            $table->tinyInteger('locked')->default('0');
            $table->tinyInteger('sticky')->default('0');
            $table->tinyInteger('visible')->default('1');
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
        Schema::dropIfExists('threads');
    }
}
