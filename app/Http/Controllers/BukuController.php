<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::all();
        return view('buku', compact('bukus'));
    }

    public function create()
    {
        return view('buku.create');
    }
    public function store(Request $req) {
        $validated = $req->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        Buku::create($validated);

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id) {
        $bukus = Buku::findOrFail($id);
        return view('bukuform', compact('bukus'));
    }
    public function update(Request $req, $id) {
        $bukus = Buku::findOrFail($id);

        $validated = $req->validate([
            'judul' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $bukus->update($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui!');
    }


    public function destroy($id) {
        $bukus = Buku::findOrFail($id);
        $bukus->delete();
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
