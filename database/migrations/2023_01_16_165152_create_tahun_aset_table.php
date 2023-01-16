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
        Schema::create('tahun_aset', function (Blueprint $table) {
            $table->id('id_tahun_aset');
            $table->foreignId('id_organisasi');
            $table->foreignId('id_jenis_aset');
            $table->foreignId('id_tahun');
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
        Schema::dropIfExists('tahun_aset');
    }
};
