<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasBridge extends Model
{
    use HasFactory;

    protected $table = 'kelas_bridges';

    protected $fillable = [
        'kelas'
    ];


    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
