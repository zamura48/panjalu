<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'Admin Panjalu',
            'role' => 'panjalu',
            'email' => 'admin@panjalu.kediri',
            'password' => Hash::make('panjalu2021'),
        ]);

        DB::table('users')->insert([
            'name' => 'Admin Layantar',
            'role' => 'layantar',
            'email' => 'admin@layantar.kediri',
            'password' => Hash::make('layantar2021'),
        ]);
    }
}
