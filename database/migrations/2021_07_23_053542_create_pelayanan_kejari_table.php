<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelayananKejariTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelayanan_kejari', function (Blueprint $table) {
            $table->id();
            $table->string('noregistrasi')->unique();
            $table->string('nama_lengkap')->nullable();
            $table->string('email')->nullable();
            $table->string('nohp')->nullable();
            $table->string('alamat')->nullable();
            $table->string('judul_pengaduan')->nullable();
            $table->string('detail_masalah', 1000)->nullable();
            $table->string('ktp')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('pelayanan_kejari');
    }
}
