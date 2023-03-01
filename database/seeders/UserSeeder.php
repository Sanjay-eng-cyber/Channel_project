<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "name" => 'Testing User',
            "email" => 'user@test.com',
            "phone" => '1234567890',
            "password" => bcrypt('password'),
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
