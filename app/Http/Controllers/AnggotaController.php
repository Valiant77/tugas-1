<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggotas = Anggota::all();
        return view('anggota', compact('anggotas'));
    }

    public function create()
    {
        return view('anggota.create');
    }
    public function store(Request $req) {
        $validated = $req->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
        ]);

        Anggota::create($validated);

        return redirect('/anggota')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit($id) {
        $anggotas = Anggota::findOrFail($id);
        return view('anggotaform', compact('anggotas'));
    }
    public function update(Request $req, $id) {
        $anggotas = Anggota::findOrFail($id);

        $validated = $req->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
        ]);

        $anggotas->update($validated);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy($id) {
        $anggotas = Anggota::findOrFail($id);
        $anggotas->delete();
        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }
}
