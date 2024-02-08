<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data_lengkap_siswa extends Model
{
    use HasFactory;

    protected $table = 'data_lengkap_siswas';

    protected $fillable = [
        'kelas'
    ];
}
