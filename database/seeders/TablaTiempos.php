<?php

namespace Database\Seeders;

use App\Models\Clinica\Tiempo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaTiempos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('tiempos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $datas = [
            ['tiempo' => 'DESAYUNO'],
            ['tiempo' => 'ALMUERZO'],
            ['tiempo' => 'CENA'],
        ];

        foreach ($datas as $data) {
            $tiempo = Tiempo::create([
                'tiempo' => $data['tiempo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
