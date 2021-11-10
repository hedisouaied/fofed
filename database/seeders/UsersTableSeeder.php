<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
            [
                'full_name' => 'hedi admin',
                'username' => 'hedi',
                'email' => 'hedisouaied2018@gmail.com',
                'password' => Hash::make('hedi1234'),
                'role' => 'admin',
                'status' => 'active'
            ],
            [
                'full_name' => 'hedi vendor',
                'username' => 'hedi v',
                'email' => 'hedisouaied2018v@gmail.com',
                'password' => Hash::make('hedi1234'),
                'role' => 'vendor',
                'status' => 'active'
            ],
            [
                'full_name' => 'hedi customer',
                'username' => 'hedi c',
                'email' => 'hedisouaied2018c@gmail.com',
                'password' => Hash::make('hedi1234'),
                'role' => 'customer',
                'status' => 'active'
            ],

        ]);
    }
}
