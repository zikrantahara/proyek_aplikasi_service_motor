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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();

            // Relasi ke Data Service (Untuk hitung total biaya)
            $table->foreignId('data_service_id')->constrained('data_services')->onDelete('cascade');

            $table->integer('jumlah_biaya');
            $table->string('jenis_pembayaran'); // Radio Button (Cash/Non Tunai)
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
