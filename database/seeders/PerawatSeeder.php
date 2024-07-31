<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PerawatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('perawat')->insert([
                'kode_perawat' => 'PR000' . $i,
                'nama' => 'dokter ' . $i,
            ]);
        }
    }
}
