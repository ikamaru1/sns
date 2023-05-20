<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Users')->insert([
        [
            'id' => '1',
            'username' => 'A太郎',
            'mail'=>'aaa@mail.com',
            'password' => Hash::make('atarou11'),
            'bio' => 'こんにちは。よろしくおねがします。',
            'images' => '',
            'created_at' => '2021-3-1 18:35:48',
            'updated_at' => '2021-3-1 18:35:48',
        ],
        [
            'id' => '2',
            'username' => 'B太郎',
            'mail'=>'bbb@mail.com',
            'password' => Hash::make('btarou11'),
            'bio' => 'こんにちは。よろしくおねがします。',
            'images' => '',
            'created_at' => '2021-3-2 18:35:48',
            'updated_at' => '2021-3-2 18:35:48',
        ],
        [
            'id' => '3',
            'username' => 'c太郎',
            'mail'=>'ccc@mail.com',
            'password' => Hash::make('ctarou11'),
            'bio' => 'こんにちは。よろしくおねがします。',
            'images' => '',
            'created_at' => '2021-3-3 18:35:48',
            'updated_at' => '2021-3-3 18:35:48',
        ],
    ]);
    }
}
