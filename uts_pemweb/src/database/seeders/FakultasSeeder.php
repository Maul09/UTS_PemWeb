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
            //
        ];

        foreach ($data as $item) {
            // Cek dulu sebelum insert
            if (!Fakultas::where('kode_fakultas', $item['kode_fakultas'])->exists()) {
                Fakultas::create($item);
            }
        }
    }
}
