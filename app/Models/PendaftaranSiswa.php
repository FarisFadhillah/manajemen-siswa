<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSiswa extends Model
{
    use HasFactory;
    
    protected $table = 'pendaftaran_siswas';

    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'nisn',
        'nik',
        'nokk',
        'no_akta',
        'agama',
        'kewarganegaraan',
        'alamat',
        'lintang',
        'bujur',
        'tinggal_bersama',
        'moda_transportasi',
        'anak_ke',
        'kip',
        'jarak_rumah',
        'waktu_tempuh',
        'jumlah_sodara',
        'prestasi',
        'no_telp',
        'email',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'nik_ayah',
        'nik_ibu',
        'nik_wali',
        'lahir_ayah',
        'lahir_ibu',
        'lahir_wali',
        'pendidikan_ayah',
        'pendidikan_ibu',
        'pendidikan_wali',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'pekerjaan_wali',
        'penghasilan_ayah',
        'penghasilan_ibu',
        'penghasilan_wali',
        'no_telp_ayah',
        'no_telp_ibu',
        'no_telp_wali',
        'asal_sekolah',
        'nis',
        'nomor_peserta',
        'nomor_ijasah',
        'hobi',
        'cita_cita',
        'doc_ijasah',
        'doc_akte',
        'doc_kk',
        'doc_ktp',
        'doc_kip',
        'status',
    ];
}
