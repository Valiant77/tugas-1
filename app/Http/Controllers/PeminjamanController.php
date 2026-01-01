<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamen = Peminjaman::all();
        return view('peminjaman', compact('peminjamen'));
    }

    public function create()
    {
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('peminjamanform', compact('anggotas', 'bukus'));
    }
    public function store(Request $req) {
        $validated = $req->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_dipinjam' => 'required|date|after_or_equal:' . date('Y-m-d'),
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_dipinjam',
            'status' => 'required|in:Dipinjam,Dikembalikan',
        ]);

        Peminjaman::create($validated);

        return redirect('/peminjaman')->with('success', 'Peminjaman berhasil ditambahkan!');
    }

    public function edit($id) {
        $peminjamen = Peminjaman::findOrFail($id);
        $anggotas = Anggota::all();
        $bukus = Buku::all();
        return view('peminjamanform', compact('peminjamen', 'anggotas', 'bukus'));
    }
    public function update(Request $req, $id) {
        $peminjamen = Peminjaman::findOrFail($id);
        $validated = $req->validate([
            'anggota_id' => 'required|exists:anggotas,id',
            'buku_id' => 'required|exists:bukus,id',
            'tanggal_dipinjam' => 'required|date|after_or_equal:' . date('Y-m-d'),
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_dipinjam',
            'status' => 'required|in:Dipinjam,Dikembalikan',
        ]);

        $peminjamen->update($validated);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil diperbarui!');
    }


    public function destroy($id) {
        $peminjamen = Peminjaman::findOrFail($id);
        $peminjamen->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil dihapus!');
    }
}

//SIX SEVEN 67 67 67 67 67 67 67 