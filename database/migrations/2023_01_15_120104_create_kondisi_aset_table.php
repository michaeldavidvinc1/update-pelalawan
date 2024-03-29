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
        Schema::create('kondisi_aset', function (Blueprint $table) {
            $table->id('id_kondisi_aset');
            $table->foreignId('id_tahun');
            $table->string('nama_aset');
            $table->string('jumlah');
            $table->string('kondisi');
            $table->string('defunct_ind');
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
        Schema::dropIfExists('kondisi_aset');
    }
};
