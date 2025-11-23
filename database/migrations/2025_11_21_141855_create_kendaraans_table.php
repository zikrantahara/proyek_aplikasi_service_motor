<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi'); // No Plat
            $table->string('jenis_kendaraan'); // Untuk Radio Button (Matic/Manual)
            $table->string('no_stnk');
            $table->string('tahun_pembuatan'); // Bisa string atau integer
            $table->string('nama_pemilik');
            $table->string('warna');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
