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
        Schema::create('cart_line_items', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('cart_id')->constrained('carts','id');
            $table->foreignId('product_id')->constrained('products','id');
            $table->integer('quantity');
            $table->decimal('sub_price', 10, 2);
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
