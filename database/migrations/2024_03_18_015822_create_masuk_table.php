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
        Schema::create('masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId("stock_id");
            $table->foreign("stock_id")->references("id")->on("stock");
            $table->date("tanggal");
            $table->text("keterangan");
            $table->unsignedInteger("qty");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masuk');
    }
};