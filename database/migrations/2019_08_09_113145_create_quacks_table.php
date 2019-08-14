<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quacks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->string('image')->nullable();
            $table->string('tags')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('duck_id');
            $table->foreign('duck_id')->references('id')->on('ducks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quacks');
    }
}
