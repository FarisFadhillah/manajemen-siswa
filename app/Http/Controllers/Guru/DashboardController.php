<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas_bridge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $guru = $request->user();

        $kelas = Kelas_bridge::where('guru_id', $guru->id)->with('kelas')->first();
        $kelasCount = Kelas_bridge::where('guru_id', $guru->id)->count();

        return view('dashboard.guru.welcome', compact('kelas', 'kelasCount'));
    }

    public function guru(Request $request)
    {
        $guru = $request->user();

        $data = Guru::where('id', $guru->id)->first();

        return view('dashboard.guru.profile', compact('data'));
    }

    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        Guru::where('id', $id)->update([
            'password' => $validate['password']
        ]);

        return redirect()->to('/guru')->with('success', 'Successfully Changed Password');
    }
}
