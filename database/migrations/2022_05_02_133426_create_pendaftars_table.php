<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendaftarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftars', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_pendaftar', ['mahasiswa', 'tendik']);
            $table->string('nama');
            $table->string('nim_nips');
            $table->string('bid_pekerjaan'); //'Akademik, Perlengkapan, Kemahasiswaan, Keuangan,'
            $table->string('fakultas');
            $table->string('prodi');
            $table->string('agama');
            $table->enum('jk', ['pria', 'wanita']);
            $table->string('tpt_lahir');
            $table->text('alamat');
            $table->string('email');
            $table->string('telepon');
            $table->text('foto');
            $table->foreignId('id_pelatihan')->constrained('pelatihans');
            $table->enum('status', ['diterima', 'belum_konfirmasi', 'ditolak']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pendaftars');
    }
}
