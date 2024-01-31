<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\StoreKategoriRequest;
use App\Http\Requests\UpdateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Kategori';
        $kategoris = Kategori::all();
        return view('kantin.kategori', compact('title', 'kategoris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' =>'required|string|max:255|unique:kategoris,nama_kategori',
        ]);

        Kategori::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambah data kategori baru.');
    }

    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' =>'required|string|max:255|unique:kategoris,nama_kategori',
        ]);

        $kategoris = Kategori::find($id);

        if (!$kategoris) {
            return redirect()->back()->with('error', 'Kategori Tidak Ditemukan');
        }

        $kategoris->nama_kategori = $request->nama_kategori;
        $kategoris->save;

        return redirect()->back()->with('success', 'Berhasil mengedit data kategori.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data kategori.');
    }
}
