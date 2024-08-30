<?php

namespace App\Http\Controllers\Clinica;

use App\Http\Controllers\Controller;
use App\Models\Clinica\Tiempo;
use Illuminate\Http\Request;

class TiempoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiempos = Tiempo::get();
        return view('intranet.clinica.tiempos.index',compact('tiempos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('intranet.clinica.tiempos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['tiempo'] = ucfirst($request['tiempo']);
        Tiempo::create($request->all());
        return redirect('dashboard/configuracion/tiempos')->with('mensaje', 'Unidad de tiempo creada con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tiempo_edit = Tiempo::findOrfail($id);
        return view('intranet.clinica.tiempos.editar',compact('tiempo_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request['tiempo'] = ucfirst($request['tiempo']);
        Tiempo::findOrFail($id)->update($request->all());
        return redirect('dashboard/configuracion/tiempos')->with('mensaje', 'Unidad de tiempo actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function active(Request $request){
        if ($request->ajax()) {
            $unidad_old = Tiempo::findOrFail($_GET['id']);
            if ($unidad_old->estado == 1) {
                $unidadUpdate['estado'] = 0;
                $respuesta = 'inactivo';
            }else{
                $unidadUpdate['estado'] = 1;
                $respuesta = 'activo';
            }
            Tiempo::findOrFail($_GET['id'])->update($unidadUpdate);
            return response()->json(['mensaje' => $respuesta]);
        } else {
            abort(404);
        }
    }
}
