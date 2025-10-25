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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->nullable();
            $table->string('nip');
            $table->string('nidn')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('cabang_dosen')->nullable();
            $table->unsignedBigInteger('kode_prodi')->nullable();
            $table->unsignedBigInteger('kode_fakultas')->nullable();
            $table->foreign('kode_prodi')->references('id')->on('prodis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('kode_fakultas')->references('id')->on('fakultas')->onDelete('cascade')->onUpdate('cascade');
            $table->string(column: 'status_kepegawaian')->nullable();
            $table->string('jenjang_pendidikan')->nullable();
            $table->string('jabatan_fungsional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('dosens');
        Schema::enableForeignKeyConstraints();
    }
};
