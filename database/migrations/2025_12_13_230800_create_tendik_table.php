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
        Schema::create('tendik', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->index();
            $table->string('nip')->index();
            $table->unique(['nama', 'nip']);
            $table->string('unit_kerja');
            $table->string('gelar_depan')->nullable();
            $table->string('gelar_belakang')->nullable();
            $table->string('status_kepegawaian'); // di sipeg namanya cabang
            $table->string('jabatan')->nullable(); // di sipeg namanya ket_status, cuma ada di dosen pns
            $table->string('golongan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tendik');
    }
};
