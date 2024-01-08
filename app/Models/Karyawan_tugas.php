<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan_tugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'jabatan_id',
        'karyawan_id'
    ];
}
