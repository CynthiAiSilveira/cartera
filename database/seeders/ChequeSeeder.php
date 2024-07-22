<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChequeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cheques')->insert([ 
            ['id_beneficiario' => 1, 'fecha_creacion' => '2023-07-18', 'cantidad' => 1000.00, 'cantidad_letra' => 'Mil pesos 00/100 M.N.'],
            ['id_beneficiario' => 2, 'fecha_creacion' => '2023-07-19', 'cantidad' => 500.50, 'cantidad_letra' => 'Quinientos pesos 50/100 M.N.'],
        ]);
    }
}
