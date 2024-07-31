<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KamarRawatInapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\KamarRawatInap::create([
            'kode_kamar' => 'R001',
            'nama' => 'Kamar Melati',
            'tipe_kamar' => 'VVIP',
            'tersedia' => true,
            'harga_hari' => 100000,
            'kapasitas' => 1,
            'created_by' => 1,

        ]);

        \App\Models\KamarRawatInap::create([
            'kode_kamar' => 'R002',
            'nama' => 'Ruangan Mawar',
            'tipe_kamar' => 'VVIP',
            'tersedia' => false,
            'harga_hari' => 200000,
            'kapasitas' => 1,
            'created_by' => 1,
        ]);

        \App\Models\KamarRawatInap::create([
            'kode_kamar' => 'R003',
            'nama' => 'Kamar Angola',
            'tipe_kamar' => 'VVIP',
            'tersedia' => false,
            'harga_hari' => 200000,
            'kapasitas' => 1,
            'created_by' => 1,
        ]);

        \App\Models\KamarRawatInap::create([
            'kode_kamar' => 'R004',
            'nama' => 'Kamar Harum',
            'tipe_kamar' => 'VIP',
            'tersedia' => true,
            'harga_hari' => 250000,
            'kapasitas' => 1,
            'created_by' => 1,
        ]);
    }
}
