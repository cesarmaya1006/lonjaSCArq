<?php

namespace Database\Seeders;

use App\Models\Empresa\Cargo;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class TablaCargos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('cargos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('cargo_has_permissions')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $datas = [
            [
                'area_id' => 1,
                'cargo' => 'Gerente General',
            ],

        ];

        $permisos = Permission::get();

        foreach ($datas as $data) {
            $cargo = Cargo::create([
                'area_id' => $data['area_id'],
                'cargo' => $data['cargo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
            foreach ($permisos as $permiso) {
                $cargo->cargos_permisos()->attach($permiso->id);
            }
        }
    }
}
