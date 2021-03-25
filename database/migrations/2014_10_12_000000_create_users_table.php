<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();            

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('nim')->unique();  

            $table->string('is_admin')->default(0);

            $table->string('angkatan');
            $table->string('status_kaderisasi')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('alamat_di_malang')->nullable();
            $table->string('alamat_asli')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('minat')->nullable();
            $table->string('bakat')->nullable();
            $table->string('target_ke_depan')->nullable();
            $table->string('alasan')->nullable();
            $table->string('photo')->default('default.png');
            $table->string('pasphoto')->nullable();
            $table->string('ktm')->nullable();
            $table->string('verifikasi')->default('Belum Verifikasi');
            $table->string('remember_token')->nullable();            
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
        Schema::dropIfExists('users');
    }
}
