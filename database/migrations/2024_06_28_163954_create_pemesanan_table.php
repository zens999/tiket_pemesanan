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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('kursi')->nullable();
            $table->timestamp('waktu');
            $table->integer('total');
            $table->enum('status', ['Belum Bayar', 'Sudah Bayar'])->default('Belum Bayar');
            $table->unsignedBigInteger('rute_id');
            $table->unsignedBigInteger('penumpang_id');
            $table->unsignedBigInteger('petugas_id')->nullable();
            $table->timestamps();

            $table->foreign('rute_id')->references('id')->on('rute');
            $table->foreign('penumpang_id')->references('id')->on('users');
            $table->foreign('petugas_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
