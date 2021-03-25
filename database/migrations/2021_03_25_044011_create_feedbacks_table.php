<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email');
            $table->string('subjek');
            $table->string('pesan',3000);
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}