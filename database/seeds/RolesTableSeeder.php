<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['Администратор', 'admin'],
            ['Модератор', 'moderator'],
            ['Клиент', 'brand'],
            ['Обычный пользователь', 'quest']
        ];
        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role[0],
                'code' => $role[1],
            ]);
        }

    }
}
