<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     *
     */
    public function up()
    {
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->text('nama');
            $table->text('deskripsi');
            $table->date('batas_daftar');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->integer('kuota');
            $table->integer('biaya');
            $table->text('foto');
            $table->foreignId('id_kategori')->nullable()->constrained('kategoris');
            $table->boolean('visible');
            $table->foreignId('id_rek')->constrained('pengaturans');
            $table->timestamps();
        });
    }

    // 'id',
    // 'nama',
    // 'deskripsi',
    // 'batas_daftar',
    // 'tgl_mulai',
    // 'tgl_akhir',
    // 'biaya',
    // 'foto',
    // 'id_kategori'

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pelatihans');
    }
}
