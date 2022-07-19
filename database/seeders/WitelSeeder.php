<?php

namespace Database\Seeders;

use App\Models\witel;
use Illuminate\Database\Seeder;

class WitelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        witel::insert([
            ['nama_witel' => 'DENPASAR', 'paket' => 10],
            ['nama_witel' => 'JEMBER', 'paket' => 5],
            ['nama_witel' => 'KEDIRI', 'paket' => 5],
            ['nama_witel' => 'NTT', 'paket' => 10], //kupang
            ['nama_witel' => 'MADIUN', 'paket' => 5],
            ['nama_witel' => 'MADURA', 'paket' => 5],
            ['nama_witel' => 'MALANG', 'paket' => 5],
            ['nama_witel' => 'MATARAM', 'paket' => 10],
            ['nama_witel' => 'PASURUAN', 'paket' => 5],
            ['nama_witel' => 'SIDOARJO', 'paket' => 5],
            ['nama_witel' => 'SINGARAJA', 'paket' => 10],
            ['nama_witel' => 'SURABAYA SELATAN', 'paket' => 5],
            ['nama_witel' => 'SURABAYA UTARA', 'paket' => 5],
        ]);
    }
}

