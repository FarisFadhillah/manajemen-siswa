<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Data_lengkap_siswa;
use App\Models\Data_ortu_siswa;
use App\Models\Data_tambahan_siswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $siswas = Siswa::whereHas('data_tambahan', function ($query) {
        //     $query->where('status', 0);
        // })->get();
        $siswas = Siswa::all();
        
        return view('dashboard.admin.pendaftaran.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswas = Siswa::where('id', $id)->first();
        $ortu = Data_ortu_siswa::where('siswa_id', $id)->first();
        $lengkap = Data_lengkap_siswa::where('siswa_id', $id)->first();
        $tambahan = Data_tambahan_siswa::where('siswa_id', $id)->first();

        return view('dashboard.admin.pendaftaran.show', compact('siswas', 'ortu', 'lengkap', 'tambahan'));
    }
    
    public function konfirmasi(string $id)
    {
        Data_tambahan_siswa::where('siswa_id', $id)->update(['status' => 1]);

        return redirect()->to('/admin/pendaftarans')->with('success', 'Successfully Change Status');

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
