<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('id_pelanggan')->constrained('users', 'id');
            $table->decimal('total_harga', 10, 0);
            $table->string('metode_pembayaran', 20)->nullable();
            $table->enum('status', [
                'Menunggu',     // order dibuat, belum dibayar/diproses
                'Diproses',     // admin sedang mengurus
                'Selesai',      // diterima pelanggan
                'Dibatalkan',       // dibatalkan oleh admin
            ])->default('Menunggu');
            $table->date('tanggal_pemesanan');
            $table->foreignId('id_alamat')->constrained('address', 'id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
