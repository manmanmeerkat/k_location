<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // 例として10件のダミーデータを挿入
        for ($i = 0; $i < 10; $i++) {
            DB::table('products')->insert([
                'product_number' => sprintf('%05d-%05d-71', mt_rand(10000, 99999), mt_rand(10000, 99999)),
                'location_number' => mt_rand(1000, 9999),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
