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
         Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk'); // Kolom id dengan auto increment dan primary key
            $table->string('nama');   // Kolom nama produk
            $table->decimal('harga', 10, 2); // Menggunakan decimal untuk harga
            $table->text('deskripsi'); // Deskripsi produk
            $table->timestamps(); // Created at dan updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
