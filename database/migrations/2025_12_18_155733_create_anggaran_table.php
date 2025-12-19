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
            $table->string('cakupan'); // ur_satker
            $table->string('tahun'); //thang
            $table->decimal('pagu_total', 18, 4);
            $table->decimal('pagu_realisasi', 18, 4);
            $table->decimal('pagu_sisa', 18, 4);
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
