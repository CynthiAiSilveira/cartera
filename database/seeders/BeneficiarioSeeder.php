<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BeneficiarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('beneficiarios')->insert([ 
            ['id_beneficiario' => 1, 'id_tipo' => 1, 'nombre' => 'Carlos Santiago'],
            ['id_beneficiario' => 2, 'id_tipo' => 2, 'nombre' => 'Zenif Arguello'],
        ]);
    }
}
