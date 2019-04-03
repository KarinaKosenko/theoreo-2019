<?php
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@gmail.com',
            'email_verified_at' => '2019-03-01 00:00:00',
            'password' => bcrypt('12345'),
            'login'=>'admin',
            'is_active'=>'1',
            'is_blocked'=>'0',
            'city_id'=>'1',
        ]);
    }
}
