<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandCityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {

            DB::table('brand_city')->insert([
                'brand_id' => $i,
                'city_id' => $i,
                'created_at' => date('Y-m-d H:i:s', time() + mt_rand(-10, -5) * 24 * 3600)
            ]);
        }
    }

}
