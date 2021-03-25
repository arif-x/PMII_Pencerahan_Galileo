<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('title');
            $table->string('keyword');
            $table->string('description',300);
            $table->string('category');
            $table->text('content');
            $table->string('status')->default('Pending');
            $table->string('thumbnail')->nullable();
            $table->string('url')->nullable();
            $table->bigInteger('views')->default('0');
            $table->string('writer');
            $table->bigInteger('writer_id');
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('articles');
    }
}