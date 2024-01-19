<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('bukus.index', compact('bukus'));
    }

    public function create()
    {
        return view('bukus.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Judul' => 'required',
            'Penulis' => 'required',
            'Penerbit' => 'required',
            'TahunTerbit' => 'required|integer',
        ]);

        Buku::create($request->all());

        return redirect()->route('bukus.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($BukuID)
    {
        $bukus = Buku::findOrFail($BukuID);
        return view('bukus.edit', compact('bukus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Judul' => 'required',
            'Penulis' => 'required',
            'Penerbit' => 'required',
            'TahunTerbit' => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update([
            'Judul'     => $request->Judul,
            'Penulis'     => $request->Penulis,
            'Penerbit'     => $request->Penerbit,
            'TahunTerbit'     => $request->TahunTerbit,
        ]);

        return redirect()->route('bukus.index')
            ->with('success', 'Buku berhasil diubah!');
    }

    public function destroy($BukuID)
    {
        $buku=Buku::findOrFail($BukuID);
        $buku->delete();

        return redirect()->route('bukus.index')->with(['success' => 'Buku Berhasil Dihapus!']);
    }

    // Tambahkan fungsi create, read, update, dan delete di sini sesuai kebutuhan
}
