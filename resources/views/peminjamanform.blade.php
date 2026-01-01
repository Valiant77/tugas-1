@extends('layout.main')
@section('title', 'Form Peminjaman')
@section('content')

<div class="card">
    <form action="{{ isset($peminjamen) ? route('peminjaman.update', $peminjamen->id) : route('peminjaman.store') }}" method="POST" class="card-body">
        @csrf
        @if(isset($peminjamen))
            @method('PUT')
        @endif
        <h1>{{ isset($peminjamen) ? 'Edit Data Peminjaman' : 'Tambah Peminjaman' }}</h1>
        <p>Isi Form Di Bawah Ini:</p>

        <div class="mb-3">
            <label class="form-label">Anggota</label>
            <select name="anggota_id" class="form-control" required>
                <option value="">Pilih Anggota</option>
                @foreach($anggotas as $anggota)
                    <option value="{{ $anggota->id }}" {{ (old('anggota_id') == $anggota->id) || (isset($peminjamen) && $peminjamen->anggota_id == $anggota->id) ? 'selected' : '' }}>{{ $anggota->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Buku</label>
            <select name="buku_id" class="form-control" required>
                <option value="">Pilih Buku</option>
                @foreach($bukus as $buku)
                    <option value="{{ $buku->id }}" {{ (old('buku_id') == $buku->id) || (isset($peminjamen) && $peminjamen->buku_id == $buku->id) ? 'selected' : '' }}>{{ $buku->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Dipinjam</label>
            <input type="date" class="form-control" name="tanggal_dipinjam" value="{{ old('tanggal_dipinjam', isset($peminjamen) ? $peminjamen->tanggal_dipinjam : '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tanggal Kembali</label>
            <input type="date" class="form-control" name="tanggal_kembali" value="{{ old('tanggal_kembali', isset($peminjamen) ? $peminjamen->tanggal_kembali : '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Dipinjam" {{ (old('status') == 'Dipinjam') || (isset($peminjamen) && $peminjamen->status == 'Dipinjam') ? 'selected' : '' }}>Dipinjam</option>
                <option value="Dikembalikan" {{ (old('status') == 'Dikembalikan') || (isset($peminjamen) && $peminjamen->status == 'Dikembalikan') ? 'selected' : '' }}>Dikembalikan</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($peminjamen) ? 'Update Peminjaman' : 'Tambah Peminjaman' }}</button>
    </form>
</div>
@endsection