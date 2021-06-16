<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ThreadCreate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channels', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('name')->default(NULL);
            $table->string('slug')->default(NULL);
            $table->text('category_description')->default(NULL);
            $table->string('icons')->default(NULL);
            $table->string('lang')->default(NULL);
            $table->tinyInteger('parent_id')->default(NULL);
            $table->tinyInteger('sort')->default(NULL);
            $table->tinyInteger('visible')->default('1');
            $table->tinyInteger('closed')->default('0');
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
        Schema::dropIfExists('channels');
    }
}
