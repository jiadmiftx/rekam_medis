<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            DB::table('obat')->insert([
                'kode_obat' => 'OBT000' . $i,
                'nama' => 'obat ' . $i,
                'deskripsi' => 'deskripsi ' . $i,
                'qty' => 20 + $i,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),

            ]);
        }
    }
}
