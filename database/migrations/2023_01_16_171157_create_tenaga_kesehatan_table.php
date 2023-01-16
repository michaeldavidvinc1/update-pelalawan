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
        Schema::create('tenaga_kesehatan', function (Blueprint $table) {
            $table->id('id_nakes');
            $table->string('nama_nakes');
            $table->foreignId('id_konsentrasi');
            $table->foreignId('id_spesialis');
            $table->foreignId('id_organisasi');
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
        Schema::dropIfExists('tenaga_kesehatan');
    }
};
