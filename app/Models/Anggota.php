<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [ 'nama', 'alamat', 'telepon' ];
    
    public function peminjamen()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
