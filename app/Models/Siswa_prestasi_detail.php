<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa_prestasi_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'keterangan'
    ];
}
