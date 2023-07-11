<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\Pelajaran;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $guru = Guru::count();
        $kelas = Kelas::count();
        $pelajaran = Pelajaran::count();
        $siswa = Siswa::count();

        return view('dashboard.admin.welcome', compact('guru', 'kelas', 'pelajaran', 'siswa'));
    }
}
