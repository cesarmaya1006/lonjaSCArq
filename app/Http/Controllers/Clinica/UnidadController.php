<?php

namespace App\Http\Controllers\Clinica;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Clinica;
use App\Models\Clinica\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('rol_principal_id')<3) {
            $clinicas = Clinica::get();
        } else {
            $clinicas = Clinica::where('id',session('clinica_id'))->get();
        }
        return view('intranet.clinica.unidades.index',compact('clinicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (session('rol_principal_id')<3) {
            $clinicas = Clinica::get();
        } else {
            $clinicas = Clinica::where('id',session('clinica_id'))->get();
        }
        return view('intranet.clinica.unidades.crear',compact('clinicas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['unidad'] = ucfirst($request['unidad']);
        Unidad::create($request->all());
        return redirect('dashboard/configuracion/unidades')->with('mensaje', 'Unidad creada con éxito');
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
        $unidad_edit = Unidad::findOrfail($id);
        if (session('rol_principal_id')<3) {
            $clinicas = Clinica::get();
        } else {
            $clinicas = Clinica::where('id',session('clinica_id'))->get();
        }
        return view('intranet.clinica.unidades.editar',compact('clinicas','unidad_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request['unidad'] = ucfirst($request['unidad']);
        Unidad::findOrFail($id)->update($request->all());
        return redirect('dashboard/configuracion/unidades')->with('mensaje', 'Unidad creada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getUnidades(Request $request){
        if ($request->ajax()) {
            return response()->json(['unidades' => Unidad::where('clinica_id',$_GET['id'])->get()]);
        } else {
            abort(404);
        }
    }

    public function active(Request $request){
        if ($request->ajax()) {
            $unidad_old = Unidad::findOrFail($_GET['id']);
            if ($unidad_old->estado == 1) {
                $unidadUpdate['estado'] = 0;
                $respuesta = 'inactivo';
            }else{
                $unidadUpdate['estado'] = 1;
                $respuesta = 'activo';
            }
            Unidad::findOrFail($_GET['id'])->update($unidadUpdate);
            return response()->json(['mensaje' => $respuesta]);
        } else {
            abort(404);
        }
    }
}
