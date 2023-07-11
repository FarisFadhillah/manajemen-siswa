<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas_bridge;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        $siswa = $request->user();

        $kelas = Kelas_bridge::where('siswa_id', $siswa->id)->first();
        $total_pelajaran = Pelajaran::count();

        return view('dashboard.siswa.welcome', compact('kelas', 'total_pelajaran'));
    }

    public function siswa(Request $request)
    {
        $siswa = $request->user();

        $data = Siswa::where('id', $siswa->id)->with('th')->first();

        return view('dashboard.siswa.profile', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        Siswa::where('id', $id)->update([
            'password' => $validate['password']
        ]);

        return redirect()->to('/siswa')->with('success', 'Successfully Changed Password');
    }
}
