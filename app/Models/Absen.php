<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'total_masuk',
        'total_izin',
        'total_sakit',
        'total_tanpa_keterangan'
    ];
}
