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
        Schema::create('apotik', function (Blueprint $table) {
            $table->id('id_apotik');
            $table->string('name_apotik');
            $table->string('alamat_apotik');
            $table->string('bidang_usaha');
            $table->string('apoteker');
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
        Schema::dropIfExists('apotik');
    }
};
