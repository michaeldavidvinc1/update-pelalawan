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
        Schema::create('alat_kontrasepsi', function (Blueprint $table) {
            $table->id('id_kontrasepsi');
            $table->string('nama_kontrasepsi');
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
        Schema::dropIfExists('alat_kontrasepsi');
    }
};
