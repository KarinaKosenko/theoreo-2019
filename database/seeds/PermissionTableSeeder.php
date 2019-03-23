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
            ['Администрирование', 'admin.admin_panel'],
            ['Управление брендами', 'admin.brands_section'],
            ['Модерация акциями', 'admin.actions_section'],
            ['Модерация контента', 'admin.content_moderation_section'],
            ['Управление пользователями', 'admin.users_section'],
            ['Поисковые запросы', 'admin.search_queries_section'],
            ['Логи парсера', 'admin.parser_logs_section'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission[0],
                'code' => $permission[1],
            ]);
        }
    }
}
