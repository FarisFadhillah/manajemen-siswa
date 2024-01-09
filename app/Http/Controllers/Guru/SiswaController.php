<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $guru = $request->user();

        $siswas = Siswa::whereHas('kelases', function ($query) use ($guru) {
            $query->where('karyawan_id', $guru->id);
        })->with('nilais', 'absen')->get();

        return view('dashboard.guru.siswas.index', compact('siswas'));
    }
}
