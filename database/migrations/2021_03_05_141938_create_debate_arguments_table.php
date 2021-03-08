<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebateArgumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debate_arguments', function (Blueprint $table) {
            $table->unsignedBigInteger('debateId')->unsigned();
            $table->unsignedBigInteger('argumentId')->unsigned();
            $table->foreign('debateId')->references('id')->on('debates')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('argumentId')->references('id')->on('arguments')->onDelete('cascade')->onUpdate('cascade');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('debate_arguments');
    }
}
