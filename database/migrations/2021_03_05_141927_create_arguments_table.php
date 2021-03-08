<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArgumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arguments', function (Blueprint $table) {
            $table->id();
            $table->string('argument_name');
            $table->unsignedBigInteger('userId')->unsigned();
            $table->unsignedBigInteger('schemeId')->unsigned();
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('schemeId')->references('id')->on('schemes')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('votes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arguments');
    }
}
