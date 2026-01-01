@extends('layout.main')
@section('title', 'Form Buku')
@section('content')

<div class="card">
    <form action="{{ isset($bukus) ? route('buku.update', $bukus->id) : route('buku.store') }}" method="POST" class="card-body">
        @csrf
        @if(isset($bukus))
            @method('PUT')
        @endif
        <h1>{{ isset($bukus) ? 'Edit Data Buku' : 'Tambah Buku' }}</h1>
        <p>Isi Form Di Bawah Ini:</p>
        <div class="mb-3">
            <label class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" placeholder="Judul Buku" value="{{ old('judul', $bukus->judul ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pengarang</label>
            <input type="text" class="form-control" name="pengarang" placeholder="Nama Pengarang" value="{{ old('pengarang', $bukus->pengarang ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Penerbit</label>
            <input type="text" class="form-control" name="penerbit" placeholder="Nama Penerbit" value="{{ old('penerbit', $bukus->penerbit ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Terbit</label>
            <input type="number" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit" min="1900" max="{{ date('Y') }}" value="{{ old('tahun_terbit', $bukus->tahun_terbit ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($bukus) ? 'Update Buku' : 'Tambah Buku' }}</button>
    </form>
</div>
@endsection