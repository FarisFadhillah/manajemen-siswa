<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $guru = $request->user();

        $mata_pelajarans = Pelajaran::all();
        $siswas = Siswa::whereHas('kelases', function ($query) use ($guru) {
            $query->where('guru_id', $guru->id);
        })->with('nilais', 'absen', 'th')->get();
        return view('dashboard.guru.nilais.index', compact('siswas', 'mata_pelajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $guru = $request->user();

        $siswas = Siswa::whereHas('kelases', function ($query) use ($guru) {
            $query->where('guru_id', $guru->id);
        })->with('nilais')->get();

        $pelajarans = Pelajaran::all();

        return view('dashboard.guru.nilais.create', compact('siswas', 'pelajarans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'siswa_id' => 'required|integer',
            'pelajarans' => 'required|array',
            'pelajarans.*.id' => 'required|integer',
            'pelajarans.*.nilai' => 'required|integer'
        ]);


        foreach ($validate['pelajarans'] as $val) {
            Nilai::create([
                'siswa_id' => $validate['siswa_id'],
                'pelajaran_id' => $val['id'],
                'nilai' => $val['nilai']
            ]);
        }

        return redirect()->to('guru/nilais')->with('success', 'Successfully Created Nilai Siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = Siswa::where('id', $id)->with('nilais', 'absen')->first();

        $mata_pelajarans = Pelajaran::all();

        return view('dashboard.guru.nilais.show', compact('siswa', 'mata_pelajarans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $guru = $request->user();

        $siswa = Siswa::where('id', $id)->whereHas('kelases', function ($query) use ($guru) {
            $query->where('guru_id', $guru->id);
        })->with('nilais')->first();

        return view('dashboard.guru.nilais.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'siswa_id' => 'required|integer',
            'pelajarans' => 'required|array',
            'pelajarans.*.id' => 'required|integer',
            'pelajarans.*.nilai_id' => 'required|integer',
            'pelajarans.*.nilai' => 'required|integer'
        ]);

        foreach ($validate['pelajarans'] as $val) {
            Nilai::where('id', $val['id'])->update([
                'siswa_id' => $validate['siswa_id'],
                'pelajaran_id' => $val['nilai_id'],
                'nilai' => $val['nilai']
            ]);
        }

        return redirect()->to('guru/nilais')->with('success', 'Successfully Updated Nilai Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
