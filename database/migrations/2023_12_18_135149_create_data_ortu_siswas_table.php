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
        Schema::create('data_ortu_siswas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id')->constrained('siswas', 'id')->onDelete('cascade');
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nik_wali')->nullable();
            $table->date('lahir_ayah')->nullable();
            $table->date('lahir_ibu')->nullable();
            $table->date('lahir_wali')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->string('no_telp_ayah')->nullable();
            $table->string('no_telp_ibu')->nullable();
            $table->string('no_telp_wali')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_ortu_siswas');
    }
};
