<?php

namespace Database\Seeders;

use App\Models\Clinica\Producto;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TablaProductos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('productos')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        $datas = [
            ['producto' => 'NORMAL', 'tipo' => 'DIETA', 'costo' => 8598,],
            ['producto' => 'ASTRINGENTE', 'tipo' => 'DIETA', 'costo' => 8552,],
            ['producto' => 'BLANDA', 'tipo' => 'DIETA', 'costo' => 8552,],
            ['producto' => 'SEMIBLANDA', 'tipo' => 'DIETA', 'costo' => 8552,],
            ['producto' => 'HIPOSÓDICA', 'tipo' => 'DIETA', 'costo' => 8552,],
            ['producto' => 'HIPOGLUCIDA', 'tipo' => 'DIETA', 'costo' => 9168,],
            ['producto' => 'HIPOGRASA', 'tipo' => 'DIETA', 'costo' => 8552,],
            ['producto' => 'HIPERCALORICA', 'tipo' => 'DIETA', 'costo' => 8775,],
            ['producto' => 'HIPERPROTEICA', 'tipo' => 'DIETA', 'costo' => 9288,],
            ['producto' => 'HIPOPROTEICA', 'tipo' => 'DIETA', 'costo' => 8552,],
            ['producto' => 'RENAL', 'tipo' => 'DIETA', 'costo' => 8552,],
            ['producto' => 'LIQUIDA COMPLETA NORMAL', 'tipo' => 'DIETA', 'costo' => 8150,],
            ['producto' => 'LIQUIDA COMPLETA ESPESA', 'tipo' => 'DIETA', 'costo' => 8527,],
            ['producto' => 'LIQUIDA CLARA', 'tipo' => 'DIETA', 'costo' => 5424,],
            ['producto' => 'DIETA BIATRICA', 'tipo' => 'DIETA', 'costo' => 6564,],
            ['producto' => 'NUEVES/ ONCES / REFR. HGL', 'tipo' => 'NUEVES/ ONCES / REFR', 'costo' => 5766,],
            ['producto' => 'NUEVES/ ONCES / REFR ADICIONALES HPPCA-HPPTA', 'tipo' => 'NUEVES/ ONCES / REFR', 'costo' => 3520,],
            ['producto' => 'NUEVES/ ONCES / REFR ADICIONALES LIQUIDA COMPLETA ESPESA', 'tipo' => 'NUEVES/ ONCES / REFR', 'costo' => 4415,],
            ['producto' => 'NUEVES/ ONCES / REFR LIQUIDA CLARA', 'tipo' => 'NUEVES/ ONCES / REFR', 'costo' => 3520,],
            ['producto' => 'NUEVES/ ONCES / REFR SEMIBLANDA', 'tipo' => 'NUEVES/ ONCES / REFR', 'costo' => 5766,],
            ['producto' => 'NUEVES/ ONCES / REFR BARIATRICA', 'tipo' => 'NUEVES/ ONCES / REFR', 'costo' => 4415,],
            ['producto' => 'KIT COMPLEMENTARIO 1', 'tipo' => 'DESECHABLES', 'costo' => 2614,],
            ['producto' => 'KIT COMPLEMENTARIO 2', 'tipo' => 'DESECHABLES', 'costo' => 939,],
            ['producto' => 'KIT SEMIBLANDA CON TAZA', 'tipo' => 'DESECHABLES', 'costo' => 2310,],
            ['producto' => 'KIT SEMIBLANDA SIN TAZA', 'tipo' => 'DESECHABLES', 'costo' => 1848,],
            ['producto' => 'ABUNDANTES LÍQUIDOS', 'tipo' => 'ADICIONALES', 'costo' => 2087,],
            ['producto' => 'ACOMPAÑANTE', 'tipo' => 'ADICIONALES', 'costo' => 2683,],
            ['producto' => 'ALPINITO', 'tipo' => 'ADICIONALES', 'costo' => 0,],
            ['producto' => 'AROMÁTICA ADICIONAL', 'tipo' => 'ADICIONALES', 'costo' => 1789,],
            ['producto' => 'ESPEZANTE 6 G', 'tipo' => 'ADICIONALES', 'costo' => 3726,],
            ['producto' => 'LIQUIDA CLARA CX BARIATRICA', 'tipo' => 'ADICIONALES', 'costo' => 0,],
            ['producto' => 'BANDEJA N° 1', 'tipo' => 'ADICIONALES', 'costo' => 268,],
            ['producto' => 'BANDEJA N° 3', 'tipo' => 'ADICIONALES', 'costo' => 343,],
            ['producto' => 'BEBIDA EN LECHE ADICIONAL', 'tipo' => 'ADICIONALES', 'costo' => 2683,],
            ['producto' => 'BON ICE', 'tipo' => 'ADICIONALES', 'costo' => 2162,],
            ['producto' => 'BOTELLA DE AGUA', 'tipo' => 'ADICIONALES', 'costo' => 2977,],
            ['producto' => 'CAJA AROMATICAS', 'tipo' => 'ADICIONALES', 'costo' => 4770,],
            ['producto' => 'CAJA TE', 'tipo' => 'ADICIONALES', 'costo' => 14158,],
            ['producto' => 'COMPOTA', 'tipo' => 'ADICIONALES', 'costo' => 2608,],
            ['producto' => 'GELATINA ADICIONAL', 'tipo' => 'ADICIONALES', 'costo' => 1937,],
            ['producto' => 'JARRA DE AGUA', 'tipo' => 'ADICIONALES', 'costo' => 1937,],
            ['producto' => 'JARRA DE JUGO', 'tipo' => 'ADICIONALES', 'costo' => 6707,],
            ['producto' => 'LICUADO', 'tipo' => 'ADICIONALES', 'costo' => 1937,],
            ['producto' => 'MAICENA EN AGUA', 'tipo' => 'ADICIONALES', 'costo' => 1639,],
            ['producto' => 'MANI CON SAL', 'tipo' => 'ADICIONALES', 'costo' => 3726,],
            ['producto' => 'PALETA CREMA', 'tipo' => 'ADICIONALES', 'costo' => 4322,],
            ['producto' => 'PALETA DE AGUA', 'tipo' => 'ADICIONALES', 'costo' => 2533,],
            ['producto' => 'AVENA EN HOJUELA 20 GR', 'tipo' => 'ADICIONALES', 'costo' => 1043,],
            ['producto' => 'PAPILLA', 'tipo' => 'ADICIONALES', 'costo' => 2533,],
            ['producto' => 'PAQ. VASO 3,5 ONZ', 'tipo' => 'ADICIONALES', 'costo' => 3279,],
            ['producto' => 'PAQ. VASO 7 ONZ', 'tipo' => 'ADICIONALES', 'costo' => 6707,],
            ['producto' => 'PORCIÓN DE FRUTA', 'tipo' => 'ADICIONALES', 'costo' => 3577,],
            ['producto' => 'PORCIÓN DE QUESO', 'tipo' => 'ADICIONALES', 'costo' => 3999,],
            ['producto' => 'PORCIÓN FARINÁCEO', 'tipo' => 'ADICIONALES', 'costo' => 1118,],
            ['producto' => 'PORCIÓN HUEVO', 'tipo' => 'ADICIONALES', 'costo' => 1267,],
            ['producto' => 'PORCIÓN PAN', 'tipo' => 'ADICIONALES', 'costo' => 596,],
            ['producto' => 'PORCIÓN PROTEÍNA', 'tipo' => 'ADICIONALES', 'costo' => 4620,],
            ['producto' => 'REFRIGERIO POST QUIRÚRGICO 1', 'tipo' => 'ADICIONALES', 'costo' => 1394,],
            ['producto' => 'REFRIGERIO POST QUIRÚRGICO 2', 'tipo' => 'ADICIONALES', 'costo' => 3726,],
            ['producto' => 'REFRIGERIO REFORZADO', 'tipo' => 'ADICIONALES', 'costo' => 6349,],
            ['producto' => 'SANDWICH', 'tipo' => 'ADICIONALES', 'costo' => 4173,],
            ['producto' => 'SOBRE GELATINA', 'tipo' => 'ADICIONALES', 'costo' => 2757,],
            ['producto' => 'VASO DE JUGO', 'tipo' => 'ADICIONALES', 'costo' => 1863,],
            ['producto' => 'YOGURT VASO  FITNESSE', 'tipo' => 'ADICIONALES', 'costo' => 5619,],
            ['producto' => 'YOGURT VASO DIETETICO', 'tipo' => 'ADICIONALES', 'costo' => 3190,],
            ['producto' => 'YOGURT VASO NORMAL', 'tipo' => 'ADICIONALES', 'costo' => 2831,],
            ['producto' => 'TAZA TÉ', 'tipo' => 'ADICIONALES', 'costo' => 2420,],
            ['producto' => 'TÉ ADICIONAL', 'tipo' => 'ADICIONALES', 'costo' => 1870,],
            ['producto' => 'GALLETAS SALTIN', 'tipo' => 'ADICIONALES', 'costo' => 1870,],
            ['producto' => 'AROMATICA 3 LITROS', 'tipo' => 'ADICIONALES', 'costo' => 20240,],
            ['producto' => 'GELATINA 3 LITROS', 'tipo' => 'ADICIONALES', 'costo' => 20130,],
            ['producto' => 'VASO DE HIELO', 'tipo' => 'ADICIONALES', 'costo' => 1210,],
            ['producto' => 'PALETICAS DE AGUA', 'tipo' => 'ADICIONALES', 'costo' => 1760,],
        ];

        foreach ($datas as $data) {
            $tiempo = Producto::create([
                'producto' => $data['producto'],
                'tipo' => $data['tipo'],
                'costo' => $data['costo'],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}
