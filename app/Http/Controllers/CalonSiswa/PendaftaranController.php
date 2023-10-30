<?php

namespace App\Http\Controllers\CalonSiswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.casis.pendaftaran.pendaftaran-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nis' => 'nullable',
            'nisn' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'no_tlp' => 'required',
            'email' => 'required',
            'password' => 'required',
            'semester' => 'nullable',
            'th_id' => 'nullable',
        ]);
        $validate['password'] = Hash::make($validate['password']);

        Siswa::create($validate);

        return redirect()->to('/')->with('success', 'Berhasil Membuat Akun');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
