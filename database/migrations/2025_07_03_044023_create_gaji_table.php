<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->foreignId('karyawan_id')->constrained('karyawan')->onDelete('cascade');
            $table->integer('gaji_pokok');
            $table->integer('tunjangan')->default(0);
            $table->integer('potongan')->default(0);
            $table->integer('total_gaji');
            $table->date('tanggal_gaji')->nullable();
            $table->string('bulan_gaji');
            $table->enum('status_pembayaran', ['sudah_dibayar', 'belum_dibayar'])->default('belum_dibayar');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};
