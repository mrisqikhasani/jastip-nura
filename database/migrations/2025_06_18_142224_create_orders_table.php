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
            $table->increments('id_pesanan');
            $table->unsignedInteger('id_pengguna');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
            $table->decimal('total_harga', 10, 0);
            $table->string('metode_pembayaran', 20)->nullable();
            $table->enum('status', [
                'Menunggu',     // order dibuat, belum dibayar/diproses
                'Diproses',     // admin sedang mengurus
                'Selesai',      // diterima pelanggan
                'Dibatalkan',       // dibatalkan oleh admin
            ])->default('Menunggu');
            $table->date('tanggal_pemesanan');
            $table->unsignedInteger('id_alamat');
            $table->foreign('id_alamat')->references('id_alamat')->on('alamat');
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
