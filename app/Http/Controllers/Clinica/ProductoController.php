<?php

namespace App\Http\Controllers\Clinica;

use App\Http\Controllers\Controller;
use App\Models\Clinica\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::get();
        return view('intranet.clinica.productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('intranet.clinica.productos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['producto'] = ucfirst($request['producto']);
        Producto::create($request->all());
        return redirect('dashboard/configuracion/productos')->with('mensaje', 'Producto / Servicio creado con éxito');
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
        $producto_edit = Producto::findOrfail($id);
        return view('intranet.clinica.productos.editar',compact('producto_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request['producto'] = ucfirst($request['producto']);
        Producto::findOrFail($id)->update($request->all());
        return redirect('dashboard/configuracion/productos')->with('mensaje', 'Producto / Servicio actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function active(Request $request){
        if ($request->ajax()) {
            $unidad_old = Producto::findOrFail($_GET['id']);
            if ($unidad_old->estado == 1) {
                $unidadUpdate['estado'] = 0;
                $respuesta = 'inactivo';
            }else{
                $unidadUpdate['estado'] = 1;
                $respuesta = 'activo';
            }
            Producto::findOrFail($_GET['id'])->update($unidadUpdate);
            return response()->json(['mensaje' => $respuesta]);
        } else {
            abort(404);
        }
    }
}
