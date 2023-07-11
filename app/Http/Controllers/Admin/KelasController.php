<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Kelas_bridge;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas_bridges = Kelas_bridge::with('siswa', 'kelas', 'guru')->get();

        return view('dashboard.admin.kelases.index', compact('kelas_bridges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelases = Kelas::all();
        $siswas = Siswa::with('kelases')->get();
        $gurus = Guru::all();

        return view('dashboard.admin.kelases.create', compact('kelases', 'siswas', 'gurus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'siswa_id' => 'required|array',
            'guru_id' => 'required',
            'kelas_id' => 'required'
        ]);

        foreach ($validate['siswa_id'] as $val) {
            Kelas_bridge::create([
                'siswa_id' => $val,
                'guru_id' => $validate['guru_id'],
                'kelas_id' => $validate['kelas_id']
            ]);
        }

        return redirect()->to('admin/kelases')->with('success', 'Successfully Created Kelas');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelas_bridge = Kelas_bridge::find($id);

        $kelases = Kelas::all();
        $siswas = Siswa::all();
        $gurus = Guru::all();

        return view('dashboard.admin.kelases.edit', compact('kelases', 'siswas', 'gurus', 'kelas_bridge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'siswa_id' => 'required',
            'guru_id' => 'required',
            'kelas_id' => 'required'
        ]);

        Kelas_bridge::where('id', $id)->update($validate);

        return redirect()->to('admin/kelases')->with('success', 'Successfully Updated Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas_bridge::where('id', $id)->delete();

        return redirect()->to('admin/kelases')->with('success', 'Successfully Deleted Kelas');
    }
}
