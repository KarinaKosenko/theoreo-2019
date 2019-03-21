<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['Бренды', 'Brand'],
            ['Акции', 'Action'],
            ['Модерация', 'Moderation'],
            ['Пользователи', 'Users'],
            ['Доступ к панели', 'Panel'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission[0],
                'code' => $permission[1],
            ]);
        }
    }
}
