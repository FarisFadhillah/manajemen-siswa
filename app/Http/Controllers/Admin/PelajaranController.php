<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelajarans = Pelajaran::all();

        return view('dashboard.admin.pelajarans.index', compact('pelajarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.pelajarans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'pelajaran' => 'required'
        ]);

        Pelajaran::create($validate);

        return redirect()->to('/admin/pelajarans')->with('success', 'Successfully Created Pelajaran');
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
        $pelajaran = Pelajaran::find($id);

        return view('dashboard.admin.pelajarans.edit', compact('pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $request->validate([
            'pelajaran' => 'required'
        ]);

        Pelajaran::where('id', $id)->update($validate);

        return redirect()->to('admin/pelajarans')->with('success', 'Successfully Updated Pelajaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pelajaran::where('id', $id)->delete();

        return redirect()->to('admin/pelajarans')->with('success', 'Successfully Deleted Pelajaran');
    }
}
