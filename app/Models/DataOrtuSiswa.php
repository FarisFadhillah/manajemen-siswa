<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOrtuSiswa extends Model
{
    use HasFactory;

    protected $table = 'data_ortu_siswas';

    protected $fillable = [
        'kelas'
    ];
}
