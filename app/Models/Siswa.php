<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Siswa extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $fillable = [
        'nama_siswa',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'password',
        'kewarganegaraan',
        'agama',
        'no_telp',
        'status',
        'status_penerimaan'
    ];


    public function nilais(): HasMany
    {
        return $this->hasMany(Nilai::class, 'siswa_id');
    }

    public function absen(): HasOne
    {
        return $this->HasOne(Absen::class, 'siswa_id', 'id');
    }
    
    public function siswa_dapodik(): HasOne
    {
        return $this->HasOne(Siswa_dapodik_detail::class, 'siswa_id', 'id');
    }

    public function kelases(): HasMany
    {
        return $this->hasMany(Wali_Kelas::class, 'siswa_id');
    }
}
