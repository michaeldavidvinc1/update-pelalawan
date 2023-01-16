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
        Schema::create('penggunaan_kontrasepsi', function (Blueprint $table) {
            $table->id('id_penggunaan_kontrasepsi');
            $table->foreignId('id_tahun');
            $table->foreignId('id_kontrasepsi');
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
        Schema::dropIfExists('penggunaan_kontrasepsi');
    }
};
