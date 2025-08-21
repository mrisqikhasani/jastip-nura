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
        Schema::create('keranjang', function (Blueprint $table) {
            $table->increments('id_keranjang');

            $table->unsignedInteger('id_pengguna');
            $table->foreign('id_pengguna')
                ->references('id_pengguna')
                ->on('pengguna')
                ->cascadeOnDelete();

            $table->decimal('total_harga', 10, 0)->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
