<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyCorpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_corp')->insert([
            'corp_name' => 'アスカプランニング株式会社',
            'postal_code' => '1234567',
            'address' => '東京都新宿区',
            'tel' => '1234567890',
            'fax' => '1234567890',
            'place' => '貴社',
            'conditions' => '従来通り',
            'deadline' => '一ヶ月',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
