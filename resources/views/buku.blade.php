@extends('layout.main')
@section('title', 'Daftar Buku')
@section('content')
<h1>Daftar Buku</h1>

<a href="/bukuform"><button class="btn btn-primary">Tambah Buku</button></a>

<table class="table margin-top: 20px; table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Judul</th>
      <th scope="col">Pengarang</th>
      <th scope="col">Penerbit</th>
      <th scope="col">Tahun Terbit</th>
      <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($bukus as $b)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->pengarang }}</td>
            <td>{{ $b->penerbit }}</td>
            <td>{{ $b->tahun_terbit }}</td>
            <td>
                <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('buku.destroy', $b->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus buku ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection