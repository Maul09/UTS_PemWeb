<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_fakultas' => 'Fakultas Teknik',
                'kode_fakultas' => 'FT',
                'dekan' => 'Ir. Budi Santoso',
                'tahun_berdiri' => 1990,
                'deskripsi' => 'Fokus pada teknologi dan rekayasa.',
                'jurusan' => 'Teknik Informatika',
            ],
            [
                'nama_fakultas' => 'Fakultas Ekonomi',
                'kode_fakultas' => 'FE',
                'dekan' => 'Dr. Sari Puspita',
                'tahun_berdiri' => 1985,
                'deskripsi' => 'Mengembangkan ilmu ekonomi dan bisnis.',
                'jurusan' => 'Manajemen',
            ],
            [
                'nama_fakultas' => 'Fakultas Keguruan',
                'kode_fakultas' => 'FKIP',
                'dekan' => 'Drs. Joko Widodo',
                'tahun_berdiri' => 1975,
                'deskripsi' => 'Menyiapkan tenaga pendidik profesional.',
                'jurusan' => 'Pendidikan Matematika',
            ],
        ];

        foreach ($data as $item) {
            // Cek dulu sebelum insert
            if (!Fakultas::where('kode_fakultas', $item['kode_fakultas'])->exists()) {
                Fakultas::create($item);
            }
        }
    }
}
