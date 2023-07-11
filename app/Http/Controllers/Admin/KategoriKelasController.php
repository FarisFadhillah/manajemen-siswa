<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KategoriKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelases = Kelas::all();

        return view('dashboard.admin.kategori-kelases.index', compact('kelases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.kategori-kelases.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'kelas' => 'required'
        ]);

        Kelas::create($validate);

        return redirect()->to('/admin/kategori-kelases')->with('success', 'Successfully Created Kategori Kelas');
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
        $kelas = Kelas::find($id);

        return view('dashboard.admin.kategori-kelases.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'kelas' => 'required'
        ]);

        Kelas::where('id', $id)->update($validate);

        return redirect()->to('/admin/kategori-kelases')->with('success', 'Successfully Updated Kategori Kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kelas::where('id', $id)->delete();

        return redirect()->to('/admin/kategori-kelases')->with('success', 'Successfully Deleted Kategori Kelas');
    }
}
