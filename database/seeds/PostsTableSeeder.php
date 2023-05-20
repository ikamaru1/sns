<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Posts')->insert([
            [
                'id' => '1',
                'user_id' => '1',
                'posts'=>'おはようございます。',
                'created_at' => '2021-3-4 18:35:48',
                'updated_at' => '2021-3-4 18:35:48',
            ],
            [
                'id' => '2',
                'user_id' => '2',
                'posts'=>'good morning',
                'created_at' => '2021-3-5 18:35:48',
                'updated_at' => '2021-3-5 18:35:48',
            ],
            [
                'id' => '3',
                'user_id' => '3',
                'posts'=>'こんにちは。',
                'created_at' => '2021-3-6 18:35:48',
                'updated_at' => '2021-3-6 18:35:48',
            ],
        ]);
    }
}
