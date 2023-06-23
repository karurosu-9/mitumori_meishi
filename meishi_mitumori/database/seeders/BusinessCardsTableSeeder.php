<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_cards')->insert([
            'corp_id' => 1,
            'division' => '営業部',
            'title' => '課長',
            'employee_name' => '田中太郎',
            'mobile_phone' => '1111111111',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
