<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Poli::create(['kode_poli' => '0001',
            'nama' => 'POLI UMUM',
            'poli_bpjs' => true,
            'poli_sakit' => true,
            'kategori' => 'umum',
            'kd_tkp' => "10",
            'created_by' => 1,
        ]);

        \App\Models\Poli::create(['kode_poli' => '0002',
            'nama' => 'POLI GIGI',
            'poli_bpjs' => true,
            'poli_sakit' => true,
            'kategori' => 'gigi',
            'kd_tkp' => "20",
            'created_by' => 1,
        ]);

        \App\Models\Poli::create(['kode_poli' => '0002',
            'nama' => 'Rawat Inap',
            'poli_bpjs' => true,
            'poli_sakit' => true,
            'kategori' => 'rawat_inap',
            'kd_tkp' => "50",
            'created_by' => 1,
        ]);

    }
}
