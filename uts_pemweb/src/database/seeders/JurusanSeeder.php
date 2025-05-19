<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Jurusan::create([
            'nama_jurusan' => 'Teknik Informatika',
            'kode_jurusan' => 'TI',
            'deskripsi' => 'Jurusan yang fokus pada pengembangan perangkat lunak.',
            'ketua_jurusan' => 'Dr. Andi Suryanto',
            'tahun_berdiri' => 2000,
        ]);
    }
}
