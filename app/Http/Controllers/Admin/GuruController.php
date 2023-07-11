<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::all();

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
            'nip' => 'required',
            'nama_guru' => 'required',
            'email' => 'required'
        ]);

        $validate['password'] = Hash::make('password'); // Password
        Guru::create($validate);

        return redirect()->to('/admin/gurus')->with('success', 'Successfully Created Guru');
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
        $guru = Guru::find($id);

        return view('dashboard.admin.gurus.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'nip' => 'required',
            'nama_guru' => 'required',
            'email' => 'required',
        ]);

        Guru::where('id', $id)->update($validate);

        return redirect()->to('/admin/gurus')->with('success', 'Successfully Updated Guru');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Guru::where('id', $id)->delete();

        return redirect()->to('/admin/gurus')->with('success', 'Successfully Deleted Guru');
    }
}
