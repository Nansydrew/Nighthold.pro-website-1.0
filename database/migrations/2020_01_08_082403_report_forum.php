<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReportForum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_forums', function (Blueprint $table) {
            $table->bigIncrements('id')->autoIncrement();
            $table->tinyInteger('topic_id')->default(NULL);
            $table->string('type')->default(NULL);
            $table->string('reason')->default(NULL);
            $table->tinyInteger('user_add')->default(NULL);
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
        Schema::dropIfExists('report_forums');
    }
}
