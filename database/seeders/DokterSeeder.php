<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('dokter')->insert([
                'kode_dokter' => 'DR000' . $i,
                'nama' => 'dokter ' . $i,
            ]);
        }
    }
}
