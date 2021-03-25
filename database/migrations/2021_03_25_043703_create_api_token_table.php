<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiTokenTable extends Migration
{
    public function up()
    {
        Schema::create('api_token', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('functions');
            $table->string('username');
            $table->string('api_token');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('api_token');
    }
}