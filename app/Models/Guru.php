<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Guru extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama_guru',
        'email',
        'password'
    ];

    public function kelases(): HasMany
    {
        return $this->hasMany(Kelas_bridge::class, 'siswa_id');
    }
}
