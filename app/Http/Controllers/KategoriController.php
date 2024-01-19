<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategoris.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategoris.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaKategori' => 'required',
        ]);

        Kategori::create($request->all());

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($KategoriID)
    {
        $kategoris = Kategori::findOrFail($KategoriID);
        return view('kategoris.edit', compact('kategoris'));
    }

    public function update(Request $request, $KategoriID)
    {
        $request->validate([
            'NamaKategori' => 'required|string|max:255',
        ]);

        $kategoris = Kategori::findOrFail($KategoriID);
        $kategoris->update($request->all());

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil diperbarui');
    }

    public function destroy($KategoriID)
    {
        $kategoris = Kategori::findOrFail($KategoriID);
        $kategoris->delete();

        return redirect()->route('kategoris.index')->with('success', 'Kategori berhasil dihapus');
    }
}