<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tipo_Beneficiario;

class Tipo_BeneficiarioSeeder extends Seeder
{
    public function run()
    {
        Tipo_Beneficiario::create([
            'tipo' => 'Tipo 1',
        ]);

        Tipo_Beneficiario::create([
            'tipo' => 'Tipo 2',
        ]);

        // Agrega más tipos de beneficiarios si es necesario
    }
}