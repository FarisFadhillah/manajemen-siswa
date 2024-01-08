<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Karyawan;
use App\Models\Karyawan_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Karyawan::all();

        return view('dashboard.admin.gurus.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.gurus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required'
        ]);

        // dd($validate);
        $validate['password'] = Hash::make('password'); // Password
        Karyawan::create($validate);

        return redirect()->to('/admin/gurus')->with('success', 'Successfully Created Guru');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gurus = Karyawan::find($id);
        $guruDetails = Karyawan_detail::where('karyawan_id', $id)->first();
        return view('dashboard.admin.gurus.show', compact('gurus', 'guruDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guru = Karyawan::find($id);
        $guruDetail = Karyawan_detail::find($id);
        

        return view('dashboard.admin.gurus.edit', compact('guru', 'guruDetail'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'nip' => 'required',
            'nuptk' => 'required',
            'nbm' => 'required',
            'tanggal_mulai' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status' => 'required',
        ]);

        // Update data in the 'karyawan' table
        Karyawan::where('id', $id)->update([
            'nama' => $validate['nama'],
            'email' => $validate['email'],
            // Add other columns for 'karyawan' as needed
        ]);

        // Check if there is an associated entry in 'karyawan_detail'
        $karyawanDetail = Karyawan_detail::where('karyawan_id', $id)->first();

        if ($karyawanDetail) {
            // Update data in the 'karyawan_detail' table
            $karyawanDetail->update([
                'nip' => $validate['nip'],
                'nuptk' => $validate['nuptk'],
                'nbm' => $validate['nbm'],
                'tanggal_mulai' => $validate['tanggal_mulai'],
                'jenis_kelamin' => $validate['jenis_kelamin'],
                'tempat_lahir' => $validate['tempat_lahir'],
                'tanggal_lahir' => $validate['tanggal_lahir'],
                'status' => $validate['status'],
                // Add other columns for 'karyawan_detail' as needed
            ]);
        } else {
            // Create a new entry in the 'karyawan_detail' table
            Karyawan_detail::create([
                'karyawan_id' => $id,
                'nip' => $validate['nip'],
                'nuptk' => $validate['nuptk'],
                'nbm' => $validate['nbm'],
                'tanggal_mulai' => $validate['tanggal_mulai'],
                'jenis_kelamin' => $validate['jenis_kelamin'],
                'tempat_lahir' => $validate['tempat_lahir'],
                'tanggal_lahir' => $validate['tanggal_lahir'],
                'status' => $validate['status'],
                // Add other columns for 'karyawan_detail' as needed
            ]);
        }
        return redirect()->to('/admin/gurus')->with('success', 'Successfully Updated Guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Karyawan::where('id', $id)->delete();

        return redirect()->to('/admin/gurus')->with('success', 'Successfully Deleted Guru');
    }
}
