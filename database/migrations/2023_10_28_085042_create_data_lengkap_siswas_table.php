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

            // $table->string('nama_lengkap')->nullable();
            // $table->string('tempat_lahir')->nullable();
            // $table->date('tanggal_lahir')->nullable();
            // $table->string('jenis_kelamin')->nullable();
            // $table->string('nisn')->unique()->nullable();
            // $table->string('nik')->unique()->nullable();
            $table->string('nokk')->unique()->nullable();
            $table->string('no_akta')->unique()->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            // $table->text('alamat')->nullable();
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
            // $table->string('no_telp')->nullable();
            // $table->string('email')->unique()->nullable();

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
        Schema::dropIfExists('data_lengkap_siswas');
    }
};
