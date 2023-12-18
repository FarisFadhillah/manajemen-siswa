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
        Schema::create('data_lengkap_siswas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('siswa_id')->constrained('siswas', 'id')->onDelete('cascade');
            $table->string('nokk')->unique()->nullable();
            $table->string('no_akta')->unique()->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('lintang')->nullable();
            $table->string('bujur')->nullable();
            $table->string('tinggal_bersama')->nullable();
            $table->string('moda_transportasi')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('kip')->nullable();
            $table->integer('tb')->nullable();
            $table->integer('bb')->nullable();
            $table->string('jarak_rumah')->nullable();
            $table->time('waktu_tempuh')->nullable();
            $table->integer('jumlah_sodara')->nullable();
            $table->string('prestasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_lengkap_siswas');
    }
};
