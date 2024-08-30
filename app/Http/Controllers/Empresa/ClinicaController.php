<?php

namespace App\Http\Controllers\Empresa;

use App\Http\Controllers\Controller;
use App\Models\Empresa\Clinica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Intervention\Image\Laravel\Facades\Image;

class ClinicaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clinicas = Clinica::get();
        return view('intranet.clinica.clinica.index',compact('clinicas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('intranet.clinica.clinica.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // - - - - - - - - - - - - - - - - - - - - - - - -
        if ($request->hasFile('logo')) {
            $ruta = Config::get('constantes.folder_img_empresas');
            $ruta = trim($ruta);

            $logo = $request->logo;
            $imagen_logo = Image::read($logo);
            $nombrelogo = time() . $logo->getClientOriginalName();
            $imagen_logo->resize(500, 500);
            $imagen_logo->save($ruta . $nombrelogo, 100);
            $clinicaNew['logo'] = $nombrelogo;
        }
        // - - - - - - - - - - - - - - - - - - - - - - - -
        $clinicaNew['clinica'] = ucwords(strtolower($request['clinica']));
        $clinicaNew['email'] = strtolower($request['email']);
        $clinicaNew['telefono'] = $request['telefono'];
        $clinicaNew['direccion'] = $request['direccion'];
        $clinicaNew['contacto'] = ucwords(strtolower($request['contacto']));
        $clinicaNew['cargo'] = ucwords(strtolower($request['cargo']));
        Clinica::create($clinicaNew);
        return redirect('dashboard/configuracion_sis/clinicas')->with('mensaje', 'Clínica creada con éxito');
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
        $clinica_edit = Clinica::findOrFail($id);
        return view('intranet.clinica.clinica.editar',compact('clinica_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $clinica_old = Clinica::findOrFail($id);
        // - - - - - - - - - - - - - - - - - - - - - - - -
        if ($request->hasFile('logo')) {
            $ruta = Config::get('constantes.folder_img_empresas');
            $ruta = trim($ruta);
            unlink($ruta . $clinica_old->logo);
            $logo = $request->logo;
            $imagen_logo = Image::read($logo);
            $nombrelogo = time() . $logo->getClientOriginalName();
            $imagen_logo->resize(500, 500);
            $imagen_logo->save($ruta . $nombrelogo, 100);
            $clinica_update['logo'] = $nombrelogo;
        }
        // - - - - - - - - - - - - - - - - - - - - - - - -
        $clinica_update['clinica'] = ucwords(strtolower($request['clinica']));
        $clinica_update['email'] = strtolower($request['email']);
        $clinica_update['telefono'] = $request['telefono'];
        $clinica_update['direccion'] = $request['direccion'];
        $clinica_update['contacto'] = ucwords(strtolower($request['contacto']));
        $clinica_update['cargo'] = ucwords(strtolower($request['cargo']));
        $clinica_old->update($clinica_update);
        return redirect('dashboard/configuracion_sis/clinicas')->with('mensaje', 'Clínica actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        if ($request->ajax()) {
            $clinica = Clinica::findOrFail($id);
            if ($clinica->areas->count() > 0) {
                return response()->json(['mensaje' => 'ng']);
            } else {
                if (Clinica::destroy($id)) {
                    $ruta = Config::get('constantes.folder_img_empresas');
                    $ruta = trim($ruta);
                    unlink($ruta . $clinica->logo);
                    return response()->json(['mensaje' => 'ok']);
                } else {
                    return response()->json(['mensaje' => 'ng']);
                }
            }
        } else {
            abort(404);
        }
    }
}
