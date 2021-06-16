<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_shop', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('title_cat', '50')->nullable();
            $table->string('description', '200')->nullable();
            $table->string('key', '80')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->tinyInteger('act')->default('1');
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
        Schema::dropIfExists('category_shop');
    }
}
