<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class usuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Marco Zacarias',
            'email' => 'mazacariasr'.'@itecnos.com.mx',
            'password' => Hash::make('azr4510m'),
        ]);
    }
}
