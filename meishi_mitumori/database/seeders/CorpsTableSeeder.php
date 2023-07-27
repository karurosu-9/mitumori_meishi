<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CorpsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('corps')->insert([
            'corp_name' => 'AAA株式会社',
            'postal_code' => '1234567',
            'address' => '東京都新宿区',
            'tel' => '1234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
