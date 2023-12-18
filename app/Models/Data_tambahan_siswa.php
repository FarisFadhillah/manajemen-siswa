<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_tambahan_siswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
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
