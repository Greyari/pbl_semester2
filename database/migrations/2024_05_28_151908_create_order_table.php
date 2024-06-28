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
        Schema::create('order', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('id_pembeli');
            $table->string('total');

            $table->foreign('id_produk')->references('id')->on('produk');
            $table->foreign('id_pembeli')->references('id')->on('pembeli');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
