<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::create('user_perusahaan', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('no_hp');
        $table->enum('status', ['aktif', 'tidak_aktif'])->default('aktif');
        $table->timestamps();
    });
}

};
