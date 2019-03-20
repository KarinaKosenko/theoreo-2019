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
        $permissions=[
            'Brand',
            'Action',
            'Moderation',
            'Users',
            'Moderation',
            'Panel',
        ];

        foreach ($permissions as $permission)
        {
            DB::table('permissions')->insert([
                'permission_name' => $permission,
            ]);
        }
    }
}
