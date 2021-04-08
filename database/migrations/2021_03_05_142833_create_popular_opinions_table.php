<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopularOpinionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popular_opinions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('schemeId')->unsigned();
            $table->foreign('schemeId')->references('id')->on('schemes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('proposition');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('popular_opinions');
    }
}
