<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CitiesTableSeeder extends Seeder
{
    protected $cities = [
        'Екатеринбург',
        'Ирбит',
        'Каменск-Уральский',
        'Кировоград',
        'Краснотурьинск',
        'Нижний Тагил',
        'Первоуральск',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->cities as $city){
            DB::table('cities')->insert([
                'name' => $city,
                'code' => Str::slug($city,'_'),
                'regions_id' => '66',
                'created_at' => Carbon::create('2019','3','1'),
            ]);
        }

    }
}
