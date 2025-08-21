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
        Schema::create('alamat', function (Blueprint $table) {
            $table->increments('id_alamat');
            $table->foreignId('id_pengguna')->constrained('users', 'id_pengguna');
            $table->string('nama_penerima', 30)->nullable();
            $table->string('nomor_telepon', 12)->nullable();
            $table->string('provinsi', 20)->nullable();
            $table->string('kota', 20)->nullable();
            $table->char('kode_pos', 5)->nullable();
            $table->text('detail_alamat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat');
    }
};
