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
        Schema::create('data_services', function (Blueprint $table) {
            $table->id();

            // Relasi ke Daftar Service (Untuk Dropdown Id Servis)
            $table->foreignId('daftar_service_id')->constrained('daftar_services')->onDelete('cascade');

            $table->string('estimasi_service');
            $table->string('nama_mekanik');
            $table->text('sparepart_pengganti')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_services');
    }
};
