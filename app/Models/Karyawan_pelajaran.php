<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan_pelajaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'pelajaran_id',
        'karyawan_id',
    ];
}
