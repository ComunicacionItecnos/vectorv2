<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Super Usuario']);
        Role::create(['name' => 'Comunicación']);
        Role::create(['name' => 'Administración']);
        Role::create(['name' => 'Relaciones Laborales']);
        Role::create(['name' => 'Reclutamiento y Selección']);
        Role::create(['name' => 'Seguridad Patrimonial']);
        Role::create(['name' => 'Servicio Médico']);
        Role::create(['name' => 'Dirección']);
    }
}
