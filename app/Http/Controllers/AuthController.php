<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        if(auth()->guard('siswa')->check()){
            return redirect()->to('/guru/beranda');
        }
        
        return view('auth.contents.login');
    }

    public function loginSiswa(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('siswa')->attempt($validate)) {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }

        return redirect()->to('/siswa');
    }

    public function guru()
    {
        if(auth()->guard('karyawan')->check()){
            return redirect()->to('/guru/beranda');
        }

        return view('auth.contents.login-guru');
    }

    public function loginGuru(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('karyawan')->attempt($validate)) {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }

        return redirect()->to('/guru/beranda');
    }


    public function admin()
    {
        if(auth()->guard('web')->check()){
            return redirect()->to('/admin/beranda');
        }

        return view('auth.contents.login-admin');
    }

    public function loginAdmin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('web')->attempt($validate)) {
            return redirect()->back()->with('error', 'Invalid Credentials');
        }

        return redirect()->to('/admin/beranda');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('/')->with('success', 'Successfully Logout');
    }
}
