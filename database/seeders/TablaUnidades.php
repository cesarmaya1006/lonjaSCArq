<?php

namespace Database\Seeders;

use App\Models\Clinica\Unidad;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaUnidades extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('unidades')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $datas = [
            ['clinica_id' => 1, 'unidad' => 'CIRUGIA',],
            ['clinica_id' => 1, 'unidad' => 'HOSP P1 FASE 2',],
            ['clinica_id' => 1, 'unidad' => 'URG P1 FASE 1',],
            ['clinica_id' => 1, 'unidad' => 'URG HOSP  P2',],
            ['clinica_id' => 1, 'unidad' => 'PISO 3 UCI',],
            ['clinica_id' => 1, 'unidad' => 'PISO 5 HOS  FASE 1',],
            ['clinica_id' => 1, 'unidad' => 'PISO 6',],
            ['clinica_id' => 1, 'unidad' => 'PISO 7',],
            ['clinica_id' => 1, 'unidad' => 'PISO 8',],
            ['clinica_id' => 1, 'unidad' => 'PISO 9',],
        ];

        foreach ($datas as $data) {
            $unidad = Unidad::create([
                'clinica_id' => $data['clinica_id'],
                'unidad' => $data['unidad'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
