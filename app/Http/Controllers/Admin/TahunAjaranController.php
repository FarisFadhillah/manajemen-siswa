<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tahun_ajaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahun_ajarans = Tahun_ajaran::all();

        return view('dashboard.admin.tahun-ajarans.index', compact('tahun_ajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.tahun-ajarans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'tahun_ajaran' => 'required'
        ]);

        Tahun_ajaran::create($validate);

        return redirect()->to('/admin/tahun-ajarans')->with('success', 'Successfully Created Tahun Ajaran');
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
        $tahun_ajaran = Tahun_ajaran::find($id);

        return view('dashboard.admin.tahun-ajarans.edit', compact('tahun_ajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'tahun_ajaran' => 'required'
        ]);

        Tahun_ajaran::where('id', $id)->update($validate);

        return redirect()->to('/admin/tahun-ajarans')->with('success', 'Successfully Updated Tahun Ajaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Tahun_ajaran::where('id', $id)->delete();

        return redirect()->to('/admin/tahun-ajarans')->with('success', 'Successfully Deleted Tahun Ajaran');
    }
}
