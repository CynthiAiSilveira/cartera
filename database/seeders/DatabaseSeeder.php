<?php

namespace Database\Seeders;
use App\Models\Cheque;
use App\Models\Beneficiario;
use App\Models\Rol;
use App\Models\Tipo_Beneficiario;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
            'name' => 'Admin ',
            'id_roles' => 2, // Reemplaza con el ID del rol de administrador
            'email' => 'admin@emple.com',
         ]);
    }
}
