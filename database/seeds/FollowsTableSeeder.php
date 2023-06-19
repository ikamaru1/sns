<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Follows')->insert([
            [
                'follow' => '2',
                'follower'=>'3',
                'created_at' => '2021-3-7 18:35:48',
            ],
            [
                'follow' => '1',
                'follower'=>'4',
                'created_at' => '2021-3-8 18:35:48',
            ],
            [
                'follow' => '1',
                'follower'=>'5',
                'created_at' => '2021-3-8 18:35:48',
            ],
        ]);
    }
}
