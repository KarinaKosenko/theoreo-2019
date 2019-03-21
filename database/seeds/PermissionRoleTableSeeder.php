<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1;$i<6;$i++)
        {
            DB::table('permission_role')->insert([
                'role_id' => '1',
                'permission_id' => $i
            ]);
        }
    }
}
