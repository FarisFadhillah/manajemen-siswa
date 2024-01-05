<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_lengkap_siswa extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'siswa_id',
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
        'tb',
        'bb',
        'jarak_rumah',
        'waktu_tempuh',
        'jumlah_sodara',
        'prestasi'
    ];
}
