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
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->id();
            $table->date('waktu_transaksi');
            $table->string('nama_pelanggan', 50);
            $table->integer('id_layanan')->length(11);
            $table->integer('berat')->length(11);
            $table->enum('pembayaran', ['Belum Bayar', 'Lunas'])->default('Belum Bayar');
            $table->enum('keterangan', ['Proses', 'Selesai'])->default('Proses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_transaksi');
    }
};
