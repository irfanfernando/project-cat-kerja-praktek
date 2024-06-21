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
        Schema::create('laporanpenjualan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("pelanggan_id");
            $table->foreign("pelanggan_id")->references("id")->on("pelanggan");
            $table->date("tanggal");
            $table->string("nota_penjualan", 255);
            $table->string("jenis_barang", 255);
            $table->unsignedInteger("jumlah");
            $table->unsignedInteger("satuan");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporanpenjualan');
    }
};
