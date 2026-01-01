<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['anggota_id', 'buku_id', 'tanggal_dipinjam', 'tanggal_kembali', 'status'];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }
}
