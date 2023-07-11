<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.contents.login');
    }

    public function loginSiswa(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('siswa')->attempt($validate)) {
            return redirect()->to('/')->with('error', 'Invalid Credentials');
        }

        return redirect()->to('/siswa');
    }

    public function guru()
    {
        return view('auth.contents.login-guru');
    }

    public function loginGuru(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('guru')->attempt($validate)) {
            return redirect()->to('/login-guru')->with('error', 'Invalid Credentials');
        }

        return redirect()->to('/guru');
    }


    public function admin()
    {
        return view('auth.contents.login-admin');
    }

    public function loginAdmin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!Auth::guard('web')->attempt($validate)) {
            return redirect()->to('/login-admin')->with('error', 'Invalid Credentials');
        }

        return redirect()->to('/admin');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->to('/')->with('success', 'Successfully Logout');
    }
}
