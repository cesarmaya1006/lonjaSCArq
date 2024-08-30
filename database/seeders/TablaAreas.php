<?php

namespace Database\Seeders;

use App\Models\Empresa\Clinica;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaAreas extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('areas')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $datas = [
            [
                'area_id' => null,
                'empresa_id' => 1,
                'area' => 'Gerencia',
            ],
        ];

        $clinicas = Clinica::get();

        $x = 1;
        $y = 1;

        foreach ($clinicas as $clinica) {
            foreach ($datas as $data) {
                if ($data['area_id'] == null) {
                    $y = $x;
                } else {
                    $data['area_id'] = $y;
                }

                DB::table('areas')->insert([
                    'area_id' => $data['area_id'],
                    'clinica_id' => $clinica->id,
                    'area' => $data['area'],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
                $x++;
            }
        }
    }
}
