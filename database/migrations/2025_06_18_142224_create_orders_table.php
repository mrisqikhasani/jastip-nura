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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->decimal('total_price', 10, 0);
            $table->string('payment_method')->nullable();
            $table->enum('status', [
                'Menunggu',     // order dibuat, belum dibayar/diproses
                'Diproses',     // admin sedang mengurus
                'Dikirim',      // barang dalam pengiriman
                'Selesai',      // diterima pelanggan
                'Cancel',       // dibatalkan oleh user/admin
                'Gagal'         // pembayaran gagal (jika ada sistem pembayaran otomatis)
            ])->default('Menunggu');
            $table->date('order_date');
            $table->foreignId('shipping_address_id')->constrained('address', 'id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
