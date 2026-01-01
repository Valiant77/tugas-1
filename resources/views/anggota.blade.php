@extends('layout.main')
@section('title', 'Daftar Anggota')
@section('content')
<h1>Daftar Anggota</h1>

<a href="/anggotaform"><button class="btn btn-primary">Tambah Anggota Baru</button></a>

<table class="table margin-top: 20px; table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Telepon</th>
      <th scope="col">Aksi</th>
    </tr>
    </thead>
    <tbody>
    @foreach($anggotas as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $a->nama }}</td>
            <td>{{ $a->alamat }}</td>
            <td>{{ $a->telepon }}</td>
            <td>
                <a href="{{ route('anggota.edit', $a->id) }}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('anggota.destroy', $a->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus anggota ini?')">Hapus</button>
                </form>
            </td>
        </tr>
    @endforeach
  </tbody>
</table>
@endsection