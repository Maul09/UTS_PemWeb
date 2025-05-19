<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dekan extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'nama', 'nip_nidn', 'jabatan', 'fakultas_id', 'foto',
    ];

    public function fakultas()
    {
        return $this->belongsTo(Fakultas::class);
    }   
}
