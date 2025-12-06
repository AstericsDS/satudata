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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->index();
            $table->string('nip')->index();
            $table->unique(['nama', 'nip']);
            $table->string('nidn');
            $table->string('gelar');
            $table->string('gelar_depan');
            $table->string('gelar_belakang');
            $table->string('jenjang');
            $table->string('unit');
            $table->string('prodi');
            $table->string('status');
            $table->json('jabatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};
