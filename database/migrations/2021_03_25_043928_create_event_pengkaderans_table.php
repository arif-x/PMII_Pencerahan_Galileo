<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPengkaderansTable extends Migration
{
    public function up()
    {
        Schema::create('event_pengkaderans', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('nama_event');
            $table->string('image');
            $table->string('tempat');
            $table->bigInteger('event_angkatan');
            $table->date('tgl_mulai_regist');
            $table->date('tgl_akhir_regist');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('event_pengkaderans');
    }
}