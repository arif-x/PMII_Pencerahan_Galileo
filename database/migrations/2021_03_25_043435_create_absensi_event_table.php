<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_event', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('id_event');
            $table->string('email');
            $table->string('nama');
            $table->string('rayon');
            $table->string('kehadiran');
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
        Schema::dropIfExists('absensi_event');
    }
}