<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TablaRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('roles')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        // ===================================================================================
        $rol1 = Role::create(['name' => 'Super Administrador']);
        $rol2 = Role::create(['name' => 'Administrador']);
        $rol3 = Role::create(['name' => 'Empleado']);
        // =======================================================================================================
        Permission::create(['name' => 'dashboard'])->syncRoles([$rol1, $rol2, $rol3]);
        // =======================================================================================================
        //Areas
        Permission::create(['name' => 'areas.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'areas.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'areas.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'areas.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'areas.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'areas.destroy'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Cargos
        Permission::create(['name' => 'cargos.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'cargos.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'cargos.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'cargos.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'cargos.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'cargos.destroy'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Facturacion
        Permission::create(['name' => 'facturacion.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'facturacion.registro.index'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Unidades
        Permission::create(['name' => 'unidades.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'unidades.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'unidades.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'unidades.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'unidades.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'unidades.active'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Tiempos
        Permission::create(['name' => 'tiempos.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'tiempos.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'tiempos.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'tiempos.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'tiempos.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'tiempos.active'])->syncRoles([$rol1, $rol2]);
        // =======================================================================================================
        //Productos
        Permission::create(['name' => 'productos.index'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'productos.create'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'productos.edit'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'productos.store'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'productos.update'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'productos.active'])->syncRoles([$rol1, $rol2]);





    }
}
