<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $fillable = ['judul', 'pengarang', 'penerbit', 'tahun_terbit'];

    public function peminjamen()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
