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
            $table->id('id');
            $table->unsignedBigInteger('id_merek');
            $table->string('nama');
            $table->text('deskripsi');
            $table->decimal('harga', 8, 2);
            $table->integer('stok')->nullable();
            $table->string('gambar');

            $table->foreign('id_merek')->references('id')->on('merek');
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
