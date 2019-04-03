<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UserInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userinfos')->insert([
            'user_id' => '1',
            'first_name' => 'Фрэйм',
            'last_name' => 'Ларавелов',
            'img' => '/img/avatar5.png',
            'sex' => 'male',
            'created_at' => Carbon::create('2019','3','25'),
        ]);
    }
}
