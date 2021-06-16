<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->string('service', '50')->nullable();
            $table->string('title', '50')->nullable();
            $table->float('price')->nullable();
            $table->string('short_code', '50')->nullable();
            $table->string('item_id', '50')->nullable();
            $table->string('store', '50')->nullable();
            $table->text('storefront')->nullable();
            $table->tinyInteger('category_id')->nullable();
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
        Schema::dropIfExists('shop');
    }
}
