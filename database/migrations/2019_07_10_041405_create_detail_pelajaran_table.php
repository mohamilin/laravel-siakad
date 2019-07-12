<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPelajaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pelajaran', function (Blueprint $table) {
            $table->bigIncrements('id_detail_pelajaran');
            $table->unsignedBigInteger('id_pelajaran');
            $table->unsignedBigInteger('id_guru');
            $table->unsignedBigInteger('id_kelas');
            $table->foreign('id_pelajaran')->references('id_pelajaran')->on('pelajaran');
            $table->foreign('id_guru')->references('id_guru')->on('guru');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas');
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
        Schema::dropIfExists('detail_pelajaran');
    }
}
