<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    //
    protected $fillable = [
        'nama_fakultas',
        'kode_fakultas',
        'dekan',
        'tahun_berdiri',
        'deskripsi',
        'jurusan', 
    ];

    public function dekans()
    {
        return $this->hasMany(Dekan::class);
    }

    // Relasi ke jurusan (kalau sudah ada)
    public function jurusans()
    {
        return $this->hasMany(Jurusan::class);
    }
}
