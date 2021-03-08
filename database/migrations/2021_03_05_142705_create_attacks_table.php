<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attacks', function (Blueprint $table) {
            $table->unsignedBigInteger('argumentA')->unsigned();
            $table->unsignedBigInteger('argumentB')->unsigned();
            $table->foreign('argumentA')->references('id')->on('arguments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('argumentB')->references('id')->on('arguments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attacks');
    }
}
