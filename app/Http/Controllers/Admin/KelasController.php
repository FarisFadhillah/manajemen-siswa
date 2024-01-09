<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Wali_kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas_bridges = Wali_kelas::with('siswa', 'kelas', 'karyawan')->get();

        return view('dashboard.admin.kelases.index', compact('kelas_bridges'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelases = Kelas::all();
        $siswas = Siswa::with('kelases')->get();

        // Retrieve all Karyawan records with their associated KaryawanTugas and Jabatan
        $karyawanTugasRecords = Karyawan::with(['karyawan_tugas', 'karyawan_tugas.jabatan'])
            ->get();

        // Filter only the records where the jabatan is 'guru'
        $karyawan = $karyawanTugasRecords->filter(function ($karyawan) {
            return optional($karyawan->karyawan_tugas)->jabatan->jabatan == 'guru';
        });

        return view('dashboard.admin.kelases.create', compact('kelases', 'siswas', 'karyawan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validate = $request->validate([
            'siswa_id' => 'required|array',
            'karyawan_id' => 'required',
            'kelas_id' => 'required'
        ]);

        foreach ($validate['siswa_id'] as $val) {
            Wali_kelas::create([
                'siswa_id' => $val,
                'karyawan_id' => $validate['karyawan_id'],
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
        $wali_kelas = Wali_kelas::find($id);

        $kelases = Kelas::all();
        $siswas = Siswa::all();
        // Retrieve all Karyawan records with their associated KaryawanTugas and Jabatan
        $karyawanTugasRecords = Karyawan::with(['karyawan_tugas', 'karyawan_tugas.jabatan'])
            ->get();

        // Filter only the records where the jabatan is 'guru'
        $karyawan = $karyawanTugasRecords->filter(function ($karyawan) {
            return optional($karyawan->karyawan_tugas)->jabatan->jabatan == 'guru';
        });
        return view('dashboard.admin.kelases.edit', compact('kelases', 'siswas', 'karyawan', 'wali_kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'siswa_id' => 'required',
            'karyawan_id' => 'required',
            'kelas_id' => 'required'
        ]);

        Wali_kelas::where('id', $id)->update($validate);

        return redirect()->to('admin/kelases')->with('success', 'Successfully Updated Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Wali_kelas::where('id', $id)->delete();

        return redirect()->to('admin/kelases')->with('success', 'Successfully Deleted Kelas');
    }
}
