<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrar', function (Blueprint $table) {
            $table->id();
            $table->integer('id_daftar');
            $table->string('emailMhs');
            $table->string('nama');
            $table->string('nim');
            $table->string('prodi');
            $table->string('tipeBeasiswa');
            $table->string('emailPribadi');
            $table->string('noHp');
            $table->date('tanggalLahir');
            $table->string('ipk');
            $table->string('nilaiPerilaku');
            $table->text('tempatTinggal');
            $table->text('ktm')->nullable();
            $table->text('ktp')->nullable();
            $table->text('transkrip')->nullable();
            $table->text('suratPernyataan')->nullable();
            $table->text('lainnya')->nullable();
            $table->string('ktm_filename')->nullable();
            $table->string('ktp_filename')->nullable();
            $table->string('transkrip_filename')->nullable();
            $table->string('suratPernyataan_filename')->nullable();
            $table->string('lainnya_filename')->nullable();
            $table->string('status_beasiswa');
            $table->string('catatan');
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
        Schema::dropIfExists('registrar');
    }
};
