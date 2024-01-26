<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataTambahanSiswa extends Model
{
    use HasFactory;

    protected $table = 'data_tambahan_siswas';

    protected $fillable = [
        'kelas'
    ];
}
