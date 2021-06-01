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
            'no_colaborador' => '147190'
        ]);
        User::create([
            'name' => 'Justo Nava Anaya',
            'email' => 'jnava@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '1',
            'no_colaborador' => '144910'
        ]);

        // ! Directores
        User::create([
            'name' => 'Fernando De la Vega Calderón',
            'email' => 'fvegac@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '8',
            'no_colaborador' => '116180'
        ]);

        User::create([
            'name' => 'Benjamín Cruz Hernández',
            'email' => 'bcruzh@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '8',
            'no_colaborador' => '113960'
        ]);

        User::create([
            'name' => 'Eduardo Escamez Goes',
            'email' => 'egoese@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '8',
            'no_colaborador' => '129300'
        ]);

        User::create([
            'name' => 'Hernán Gonzáles Moralez',
            'email' => 'hgonzalezm@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '8',
            'no_colaborador' => '130145'
        ]);

        User::create([
            'name' => 'José Luis Rodríguez Mandujano',
            'email' => 'jlrodriguezm@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '8',
            'no_colaborador' => '131901'
        ]);

        User::create([
            'name' => 'Jorge Peacock López',
            'email' => 'jpeacockl@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '8',
            'no_colaborador' => '135050'
        ]);

        User::create([
            'name' => 'Jaime Mendoza Maciel',
            'email' => 'jmendozam@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '8',
            'no_colaborador' => '143010'
        ]);

        User::create([
            'name' => 'Alejandro Raúl Ramírez Flores',
            'email' => 'aramirezf@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '8',
            'no_colaborador' => '152090'
        ]);

        // ! Capital Humano - Comunicación
        User::create([
            'name' => 'Carlos Mazón Sánchez',
            'email' => 'cmazons@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '2',
            'no_colaborador' => '139810'
        ]);
        User::create([
            'name' => 'José Luis Arellano Millán',
            'email' => 'jlarellano@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '2',
            'no_colaborador' => '103541'
        ]);
        User::create([
            'name' => 'Maylin Alexandra Gómez Salmerón',
            'email' => 'mgomez@factoraguila.com',
            'password' => bcrypt('12345678'),
            'role_id' => '2',
            'no_colaborador' => '307'
        ]);

        // ! Capital Humano - Administración
        User::create([
            'name' => 'M. Teresa Ramírez Ramírez',
            'email' => 'tramirezr@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '3',
            'no_colaborador' => '152124'
        ]);
        User::create([
            'name' => 'Angie Arlae Peralta Aragón',
            'email' => 'aaperalta@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '3',
            'no_colaborador' => '135200'
        ]);
        User::create([
            'name' => 'B. Yanet Navor Saavedra',
            'email' => 'ynavors@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '3',
            'no_colaborador' => '145000'
        ]);
        User::create([
            'name' => 'Luis Francisco Adelaido Garcia',
            'email' => 'ladelaidog@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '3',
            'no_colaborador' => '103650'
        ]);


        // ! Capital Humano - Relaciones Laborales
        User::create([
            'name' => 'Edgar David García Lara',
            'email' => 'edgarcial@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '4',
            'no_colaborador' => '123750'
        ]);
        User::create([
            'name' => 'Christian Leyva Catalán',
            'email' => 'cleyvac@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '4',
            'no_colaborador' => '53016'
        ]);
        User::create([
            'name' => 'Reynel Reyna Torres',
            'email' => 'bcorlaborales@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '4',
            'no_colaborador' => '308'
        ]);


        // ! Capital Humano - Reclutamiento y Selección
        User::create([
            'name' => 'Jesús Gabriel Hernández Parra',
            'email' => 'ghernandezp@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
            'no_colaborador' => '130760'
        ]);
        User::create([
            'name' => 'Rosa Isela Ayala Torres',
            'email' => 'bcocapitalhumano2@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
            'no_colaborador' => '103000'
        ]);
        User::create([
            'name' => 'Ana Karen Brena Alejo',
            'email' => 'akbrena@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
            'no_colaborador' => '106800'
        ]);
        User::create([
            'name' => 'Ana María Castro Domínguez',
            'email' => 'amcastrod@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
            'no_colaborador' => '110557'
        ]);
        User::create([
            'name' => 'Andrea Castro García',
            'email' => 'acastrog@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
            'no_colaborador' => '110559'
        ]);
        User::create([
            'name' => 'Hilda Liz Alfaro Juantorena',
            'email' => 'halfaroj@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
            'no_colaborador' => '103201'
        ]);
        User::create([
            'name' => 'Gabriela Mejía Tapia',
            'email' => 'gmejiat@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '5',
            'no_colaborador' => '142020'
        ]);

        // ! Seguridad Patrimonial
        User::create([
            'name' => 'SP1',
            'email' => 'spatrimonial1@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '6',
            'no_colaborador' => '999999'
        ]);
        User::create([
            'name' => 'Mariana Garcia Garcia',
            'email' => 'mgarciag@itecnos.com.mx',
            'password' => bcrypt('12345678'),
            'role_id' => '6',
            'no_colaborador' => '124000'
        ]);
    }
}
