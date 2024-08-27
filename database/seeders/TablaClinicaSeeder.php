<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaClinicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('clinicas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        // ===================================================================================
        $datas = [
            [
                'clinica' => 'CLINICA NUEVA EL LAGO',
                'email' => 'gerencia@clinicanuevaellago.com',
                'telefono' => '(601) 307 70 51',
                'direccion' => 'Calle 76 # 13-02',
                'contacto' => 'pepita Perez',
                'cargo' => 'Gerente',
                'logo' => 'clinica1.png',

            ],
        ];
        // ===================================================================================
        foreach ($datas as $data) {
            DB::table('empresas')->insert([
                'clinica' => $data['empresa'],
                'email' => $data['email'],
                'telefono' => $data['telefono'],
                'direccion' => $data['direccion'],
                'contacto' => $data['contacto'],
                'cargo' => $data['cargo'],
                'logo' => $data['logo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
