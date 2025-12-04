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
        Schema::create('kerjasama', function (Blueprint $table) {
            $table->string('id')->unique()->primary();
            $table->string('tahun');
            $table->text('nama_kerjasama');
            $table->string('nama_partner');
            $table->string('klasifikasi');
            $table->string('negara');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->string('status');
            $table->string('jenis_dokumen');
            $table->string('unit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasama');
    }
};
