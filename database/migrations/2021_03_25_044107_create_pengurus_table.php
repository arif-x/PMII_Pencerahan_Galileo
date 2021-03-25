<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengurusTable extends Migration
{
    public function up()
    {
        Schema::create('pengurus', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('nim');
            $table->string('nama');
            $table->string('jabatan');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pengurus');
    }
}