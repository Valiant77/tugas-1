@extends('layout.main')
@section('title', 'Form Anggota')
@section('content')

<div class="card">
    <form action="{{ isset($anggotas) ? route('anggota.update', $anggotas->id) : route('anggota.store') }}" method="POST" class="card-body">
        @csrf
        @if(isset($anggotas))
            @method('PUT')
        @endif
        <h1>{{ isset($anggotas) ? 'Edit Data Anggota' : 'Tambah Anggota' }}</h1>
        <p>Isi Form Di Bawah Ini:</p>
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{ old('nama', $anggotas->nama ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Alamat (Jalan dan Nomor Rumah)" value="{{ old('alamat', $anggotas->alamat ?? '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Telepon</label>
            <input type="text" class="form-control" name="telepon" placeholder="Telepon Anggota (contoh: 081234567890)" value="{{ old('telepon', $anggotas->telepon ?? '') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset($anggotas) ? 'Update Anggota' : 'Tambah Anggota' }}</button>
    </form>
</div>
@endsection