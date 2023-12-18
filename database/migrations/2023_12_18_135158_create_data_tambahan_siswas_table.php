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
        Schema::create('data_tambahan_siswas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas', 'id')->onDelete('cascade');
            $table->string('asal_sekolah')->nullable();
            $table->string('nis')->nullable();
            $table->string('nomor_peserta')->nullable();
            $table->string('nomor_ijasah')->nullable();
            $table->string('hobi')->nullable();
            $table->string('cita_cita')->nullable();

            $table->string('doc_ijasah')->nullable();
            $table->string('doc_akte')->nullable();
            $table->string('doc_kk')->nullable();
            $table->string('doc_ktp')->nullable();
            $table->string('doc_kip')->nullable();
            $table->string('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tambahan_siswas');
    }
};
