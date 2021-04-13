<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ! Super Usuarios
        User::create([
            'name' => 'Marco Alexis Zacarias Rubio',
            'email' => 'mazacariasr@itecnos.com.mx',
            'password' => bcrypt('azr4510m'),
            'role_id' => '1',
        ]);
        User::create([
            'name' => 'Justo Nava Anaya',
            'email' => 'jnava@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '1',
        ]);

        // ! Directores
        User::create([
            'name' => 'Fernando De la Vega Calderón',
            'email' => 'fvegac@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '8',
        ]);

        // ! Capital Humano - Comunicación
        User::create([
            'name' => 'Carlos Mazón Sánchez',
            'email' => 'cmazons@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'José Luis Arellano Millán',
            'email' => 'jlarellano@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '2',
        ]);
        User::create([
            'name' => 'Maylin Alexandra Gómez Salmerón',
            'email' => 'mgomez@factoraguila.com',
            'password' => bcrypt('12345678'),
            'role_id' => '2',
        ]);

        // ! Capital Humano - Administración
        User::create([
            'name' => 'M. Teresa Ramírez Ramírez',
            'email' => 'tramirezr@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '3',
        ]);
        User::create([
            'name' => 'Angie Arlae Peralta Aragón',
            'email' => 'aaperalta@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '3',
        ]);
        User::create([
            'name' => 'B. Yannet Navor Saavedra',
            'email' => 'ynavors@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '3',
        ]);
        User::create([
            'name' => 'Luis Francisco Adelaido Garcia',
            'email' => 'ladelaidog@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '3',
        ]);


        // ! Capital Humano - Relaciones Laborales
        User::create([
            'name' => 'Edgar David García Lara',
            'email' => 'edgarcial@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '4',
        ]);
        User::create([
            'name' => 'Christian Leyva Catalán',
            'email' => 'cleyvac@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '4',
        ]);
        User::create([
            'name' => 'Reynel Reyna Torres',
            'email' => 'bcorlaborales@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '4',
        ]);


        // ! Capital Humano - Reclutamiento y Selección
        User::create([
            'name' => 'Jesús Gabriel Hernández Parra',
            'email' => 'ghernandezp@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
        ]);
        User::create([
            'name' => 'Rosa Isela Ayala Torres',
            'email' => 'bcocapitalhumano2@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
        ]);
        User::create([
            'name' => 'Ana Karen Brena Alejo',
            'email' => 'akbrena@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
        ]);
        User::create([
            'name' => 'Ana María Castro Domínguez',
            'email' => 'amcastrod@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
        ]);
        User::create([
            'name' => 'Andrea Castro García',
            'email' => 'acastrog@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
        ]);

        // ! Seguridad Patrimonial
        User::create([
            'name' => 'SP1',
            'email' => 'spatrimonial1@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '6',
        ]);
        User::create([
            'name' => 'SP2',
            'email' => 'spatrimonial2@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '6',
        ]);
    }
}
