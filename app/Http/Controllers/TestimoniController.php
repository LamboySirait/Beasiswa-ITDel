<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimoni;
use Alert;

class TestimoniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimoni = Testimoni::all();
        return view('admin.testimoni', compact('testimoni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.createtestimoni');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'isi' => 'required',
            'author' => 'required'
        ]);

        Testimoni::create($validatedData);
        Alert::success('Sukses', 'Data Telah Disimpan.');

        return redirect()->route('testimoni');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimoni = Testimoni::find($id);

        if (!$testimoni) {
            return redirect()->route('testimoni')->with('error', 'Testimoni tidak ditemukan.');
        }

        return view('admin.edittestimoni', compact('testimoni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'isi' => 'required',
            'author' => 'required'
        ]);

        $testimoni = Testimoni::find($id);

        if (!$testimoni) {
            return redirect()->route('testimoni')->with('error', 'Testimoni tidak ditemukan.');
        }

        $testimoni->update($validatedData);
        Alert::success('Sukses', 'Data telah diperbarui.');

        return redirect()->route('testimoni');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimoni = Testimoni::find($id);
        $testimoni->delete();
        Alert::success('Sukses', 'Data Telah Dihapus.');

        return redirect()->route('testimoni');
    }
}