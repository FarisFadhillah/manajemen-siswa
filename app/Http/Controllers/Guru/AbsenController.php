<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Absen;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsenController extends Controller
{

    public function create(Request $request)
    {
        $guru = $request->user();

        $siswas = Siswa::whereHas('kelases', function ($query) use ($guru) {
            $query->where('guru_id', $guru->id);
        })->with('absen')->get();

        return view('dashboard.guru.absens.create', compact('siswas'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'siswa_id' => 'required',
            'total_masuk' => 'required|integer',
            'total_izin' => 'required|integer',
            'total_sakit' => 'required|integer',
            'total_tanpa_keterangan' => 'required|integer',
        ]);

        Absen::create($validate);

        return redirect()->to('guru/nilais')->with('Successfully Created Absen Siswa');
    }

    public function edit(Request $request, string $id)
    {
        $siswa = Siswa::where('id', $id)->with('absen')->first();

        return view('dashboard.guru.absens.edit', compact('siswa'));
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'siswa_id' => 'required',
            'total_masuk' => 'required|integer',
            'total_izin' => 'required|integer',
            'total_sakit' => 'required|integer',
            'total_tanpa_keterangan' => 'required|integer',
        ]);

        Absen::where('siswa_id', $id)->update($validate);

        return redirect()->to('guru/nilais')->with('Successfully Updated Absen Siswa');
    }
}
