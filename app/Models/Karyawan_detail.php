<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan_detail extends Model
{
    use HasFactory;

    protected $fillable = [
        'karyawan_id',
        'nip',
        'nuptk',
        'nbm',
        'tanggal_mulai',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'status'
    ];

    public function karyawanDetail()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
