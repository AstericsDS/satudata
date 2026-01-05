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
        Schema::create('anggaran', function (Blueprint $table) {
            $table->id();
            $table->string('satker');
            $table->string('tahun');
            $table->enum('data_scope', ['total', 'akun', 'output']);
            $table->string('nama');
            $table->bigInteger('pagu_total');
            $table->bigInteger('pagu_realisasi');
            $table->bigInteger('pagu_sisa');
            $table->unique(['tahun', 'satker', 'nama', 'data_scope'], 'anggaran_unique_identifier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggaran');
    }
};
