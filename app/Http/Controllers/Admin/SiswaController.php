<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::all();

        return view('dashboard.admin.siswas.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $ths = Tahun_ajaran::all();

        return view('dashboard.admin.siswas.create', compact('ths'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'semester' => 'required',
            'th_id' => 'required',
            'email' => 'required',
        ]);
        $validate['password'] = Hash    ::make('password'); // Password

        Siswa::create($validate);

        return redirect()->to('admin/siswas')->with('success', 'Successfully Created Siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $siswa = Siswa::find($id);
        $ths = Tahun_ajaran::all();

        return view('dashboard.admin.siswas.edit', compact('siswa', 'ths'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama_siswa' => 'required',
            'nis' => 'required',
            'nisn' => 'required',
            'semester' => 'required',
            'th_id' => 'required',
            'email' => 'required',
        ]);

        Siswa::where('id', $id)->update($validate);

        return redirect()->to('admin/siswas')->with('success', 'Successfully Updated Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::where('id', $id)->delete();

        return redirect()->to('admin/siswas')->with('success', 'Successfully Deleted Siswa');
    }
}
