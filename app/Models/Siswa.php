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
        'email',
        'password',
        'nis',
        'nisn',
        'semester',
        'th_id'
    ];

    public function th(): BelongsTo
    {
        return $this->belongsTo(Tahun_ajaran::class);
    }

    public function nilais(): HasMany
    {
        return $this->hasMany(Nilai::class, 'siswa_id');
    }

    public function absen(): HasOne
    {
        return $this->HasOne(Absen::class, 'siswa_id', 'id');
    }

    public function kelases(): HasMany
    {
        return $this->hasMany(Kelas_bridge::class, 'siswa_id');
    }
}