<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigIncrements('id_nilai');
            $table->integer('semester');
            $table->unsignedBigInteger('id_detail_pelajaran');
            $table->unsignedBigInteger('id_siswa');
            $table->integer('nilai_tugas1');
            $table->integer('nilai_tugas2');
            $table->integer('nilai_uts');
            $table->integer('nilai_uas');
            $table->string('keterangan');
            $table->foreign('id_detail_pelajaran')->references('id_detail_pelajaran')->on('detail_pelajaran');
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa');
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
        Schema::dropIfExists('nilai');
    }
}
