<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisbarang = JenisBarang::all();
        return view('jenisbarang.index', compact('jenisbarang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $latestJenis = JenisBarang::latest('id_jenis')->first();
        $tambahjenis = $latestJenis ? $latestJenis->id_jenis + 1 : 1;
    
        return view('jenisbarang.create', compact('tambahjenis'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jenis_barang' => 'required',
        ]);

        JenisBarang::create([
            'nama_jenis_barang' => $request->nama_jenis_barang,
        ]);

        return redirect()->route('jenisbarang.index')->with('success', 'Berhasil menambah data!');
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
    public function edit($id)
    {
        $jenisbarang = JenisBarang::find($id);
        return view('jenisbarang.edit', compact('jenisbarang'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenis = JenisBarang::find($id);

        $request->validate([
            'nama_jenis_barang',
        ]);

        $jenis->update([
            'nama_jenis_barang' => $request->nama_jenis_barang,
        ]);

        return redirect()->route('jenisbarang.index')->with('success', 'Berhasil menambah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenis = JenisBarang::find($id);

        if (!$jenis) {
            return redirect()->route('jenisbarang.index')->with('error', 'Record not found');
        }
        $jenis->delete();
        // dd($jenis);
        return redirect()->route('jenisbarang.index')->with('success', 'Record deleted successfully');
    }
}
