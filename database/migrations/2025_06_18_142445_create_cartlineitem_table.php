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
        Schema::create('detail_keranjang', function (Blueprint $table) {
            $table->increments('id_detail_keranjang');

            $table->unsignedInteger('id_keranjang');
            $table->foreign('id_keranjang')
                ->references('id_keranjang')
                ->on('keranjang')
                ->cascadeOnDelete();

            $table->unsignedInteger('id_produk');
            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
                ->cascadeOnDelete();

            $table->integer('kuantitas');
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_line_items');
    }
};
