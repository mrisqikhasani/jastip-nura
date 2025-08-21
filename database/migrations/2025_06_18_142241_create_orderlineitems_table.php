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
        Schema::create('detail_pesanan', function (Blueprint $table) {
            $table->increments('id_detail_pesanan');

            $table->unsignedInteger('id_pesanan');
            $table->foreign('id_pesanan')
                ->references('id_pesanan')
                ->on('pesanan')
                ->cascadeOnDelete();


            $table->unsignedInteger('id_produk');
            $table->foreign('id_produk')
                ->references('id_produk')
                ->on('produk')
                ->cascadeOnDelete();

            $table->integer('kuantitas');
            $table->decimal('subtotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan');
    }
};
