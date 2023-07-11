<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{

    public function index()
    {
        $mata_pelajarans = Pelajaran::all();
        $siswas = Siswa::with('nilais', 'absen', 'th')->get();

        return view('dashboard.admin.nilais.index', compact('siswas', 'mata_pelajarans'));
    }

    public function show(string $id)
    {
        $siswa = Siswa::where('id', $id)->with('nilais', 'absen')->first();
        $mata_pelajarans = Pelajaran::all();
        // dd($siswa);
        return view('dashboard.admin.nilais.show', compact('siswa', 'mata_pelajarans'));
    }
}
