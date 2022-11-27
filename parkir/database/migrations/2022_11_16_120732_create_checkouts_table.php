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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('idPegawai');
            $table->string('noPolisi');
            $table->string('jenisKendaraan');
            $table->dateTime('tglMasuk');
            $table->dateTime('tglKeluar')->nullable();
            $table->integer('biaya')->nullable();
            $table->timestamps();

            $table->foreign('idPegawai')->references('id')->on('pegawais');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
};
