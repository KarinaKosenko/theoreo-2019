<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 125; $i++) {
            $count=mt_rand(3, 6);
            for ($t = 1; $t <= $count; $t++) {
            DB::table('action_tag')->insert([
                'action_id' => $i,
                'tag_id' => mt_rand(1, 47),
                'created_at' => date('Y-m-d H:i:s', time() + mt_rand(-10, -5) * 24 * 3600)
            ]);
        }
    }
    }
}
