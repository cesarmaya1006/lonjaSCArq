<?php

namespace App\Http\Controllers\Facturacion;

use App\Http\Controllers\Controller;
use App\Models\Clinica\Producto;
use App\Models\Clinica\Tiempo;
use App\Models\Empresa\Clinica;
use Illuminate\Http\Request;

class RegistroFactController extends Controller
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
        $clinica = Clinica::findOrFail(1);
        $tiempos = Tiempo::get();
        $productos = Producto::get();
        return view('intranet.facturacion.registrar.index',compact('clinicas','tiempos','clinica','productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
