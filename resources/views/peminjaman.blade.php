@extends('layout.main')
@section('title', 'Daftar Peminjam')
@section('content')
<h1>Daftar Peminjam</h1>

<a href="/peminjamanform"><button class="btn btn-primary">Buat Peminjaman Baru</button></a>

<table class="table margin-top: 20px; table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Buku</th>
      <th scope="col">Nama Peminjam</th>
      <th scope="col">Tanggal Dipinjam</th>
      <th scope="col">Tanggal Kembali</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($peminjamen as $p)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $p->buku->judul }}</td>
            <td>{{ $p->anggota->nama }}</td>
            <td>{{ $p->tanggal_dipinjam }}</td>
            <td>{{ $p->tanggal_kembali ?? 'N/A' }}</td>
            <td>{{ $p->status }}</td>
            <td>
                <a href="{{ route('peminjaman.edit', $p->id) }}"><button class="btn btn-primary btn-sm">Edit</button></a>
                <form action="{{ route('peminjaman.destroy', $p->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        @endforeach
        </tr>
    </tbody>
</table>
@endsection