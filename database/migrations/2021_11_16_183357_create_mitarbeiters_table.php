<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitarbeitersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitarbeiter', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('firmen_id');
            $table->foreign('firmen_id')->references('id')->on('firmen')->onDelete('cascade');
            $table->string('vorname');
            $table->string('nachname');
            $table->string('email');
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
        Schema::dropIfExists('mitarbeiter');
    }
}
