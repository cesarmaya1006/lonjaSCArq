<?php

use App\Http\Controllers\Clinica\ProductoController;
use App\Http\Controllers\Clinica\TiempoController;
use App\Http\Controllers\Clinica\UnidadController;
use App\Http\Controllers\Config\MenuController;
use App\Http\Controllers\Config\MenuRolController;
use App\Http\Controllers\Config\PageController;
use App\Http\Controllers\Config\PermisoController;
use App\Http\Controllers\Config\PermisoRolController;
use App\Http\Controllers\Config\RolController;
use App\Http\Controllers\Empresa\AreaController;
use App\Http\Controllers\Empresa\CargoController;
use App\Http\Controllers\Empresa\ClinicaController;
use App\Http\Controllers\Empresa\EmpleadoController;
use App\Http\Controllers\Empresa\PermisoEmpleadoController;
use App\Http\Controllers\Extranet\ExtranetPageController;
use App\Http\Controllers\Facturacion\FacturacionController;
use App\Http\Controllers\Facturacion\RegistroFactController;
use App\Http\Middleware\AdminEmp;
use App\Http\Middleware\Empleado;
use App\Http\Middleware\SuperAdmin;
use Illuminate\Support\Facades\Route;


Route::controller(ExtranetPageController::class)->group(function () {
    Route::get('/', 'index')->name('extranet.index');
    Route::get('/registro', 'registro')->name('extranet.registro');
    Route::get('/loginapp', 'loginapp')->name('extranet.loginapp');
    Route::post('/register', 'register')->name('extranet.store');

});
Route::prefix('dashboard')->middleware(['auth:sanctum', config('jetstream.auth_session'),])->group(function () {
    Route::get('', [PageController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [PageController::class, 'profile'])->name('profile');

    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    //Middleware Super admin
    Route::prefix('configuracion_sis')->middleware(SuperAdmin::class)->group(function () {
        // Ruta Administrador del Sistema Menus
        // ------------------------------------------------------------------------------------
        Route::controller(MenuController::class)->prefix('menu')->group(function () {
            Route::get('', 'index')->name('menu.index');
            Route::get('crear', 'create')->name('menu.create');
            Route::get('editar/{id}', 'edit')->name('menu.edit');
            Route::post('guardar', 'store')->name('menu.store');
            Route::put('actualizar/{id}', 'update')->name('menu.update');
            Route::get('eliminar/{id}', 'destroy')->name('menu.destroy');
            Route::get('guardar-orden', 'guardarOrden')->name('menu.ordenar');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Roles
        Route::controller(RolController::class)->prefix('rol')->group(function () {
            Route::get('', 'index')->name('rol.index');
            Route::get('crear', 'create')->name('rol.create');
            Route::get('editar/{id}', 'edit')->name('rol.edit');
            Route::post('guardar', 'store')->name('rol.store');
            Route::put('actualizar/{id}', 'update')->name('rol.update');
            Route::delete('eliminar/{id}', 'destroy')->name('rol.destroy');
        });
        // ----------------------------------------------------------------------------------------
        /* Ruta Administrador del Sistema Menu Rol*/
        Route::controller(MenuRolController::class)->prefix('permisos_menus_rol')->group(function () {
            Route::get('', 'index')->name('menu.rol.index');
            Route::post('guardar', 'store')->name('menu.rol.store');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Roles
        Route::controller(PermisoController::class)->prefix('permiso_rutas')->group(function () {
            Route::get('', 'index')->name('permiso_rutas.index');
        });
        // ----------------------------------------------------------------------------------------
        /* Ruta Administrador del Sistema Menu Rol*/
        Route::controller(PermisoRolController::class)->prefix('permisos_rol')->group(function () {
            Route::get('', 'index')->name('permisos_rol.index');
            Route::post('guardar', 'store')->name('permisos_rol.store');
            Route::get('excepciones/{permission_id}/{role_id}', 'excepciones')->name('permisos_rol.excepciones');
            Route::post('guardar_excepciones', 'store_excepciones')->name('permisos_rol.store_excepciones');
        });
        // ----------------------------------------------------------------------------------------
        // ------------------------------------------------------------------------------------
        // Ruta Administrador Clinicas
        // ------------------------------------------------------------------------------------
        Route::controller(ClinicaController::class)->prefix('clinicas')->group(function () {
            Route::get('', 'index')->name('clinicas.index');
            Route::get('crear', 'create')->name('clinicas.create');
            Route::get('editar/{id}', 'edit')->name('clinicas.edit');
            Route::post('guardar', 'store')->name('clinicas.store');
            Route::put('actualizar/{id}', 'update')->name('clinicas.update');
            Route::delete('eliminar/{id}', 'destroy')->name('clinicas.destroy');
        });
        // ----------------------------------------------------------------------------------------
    });
    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    Route::prefix('configuracion')->middleware(AdminEmp::class)->group(function () {
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Areas
        Route::controller(AreaController::class)->prefix('areas')->group(function () {
            Route::get('', 'index')->name('areas.index');
            Route::get('crear', 'create')->name('areas.create');
            Route::get('editar/{id}', 'edit')->name('areas.edit');
            Route::post('guardar', 'store')->name('areas.store');
            Route::put('actualizar/{id}', 'update')->name('areas.update');
            Route::delete('eliminar/{id}', 'destroy')->name('areas.destroy');
            Route::get('getDependencias/{id}', 'getDependencias')->name('areas.getDependencias');
            Route::get('getAreas', 'getAreas')->name('areas.getAreas');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Cargos
        Route::controller(CargoController::class)->prefix('cargos')->group(function () {
            Route::get('', 'index')->name('cargos.index');
            Route::get('crear', 'create')->name('cargos.create');
            Route::get('editar/{id}', 'edit')->name('cargos.edit');
            Route::post('guardar', 'store')->name('cargos.store');
            Route::put('actualizar/{id}', 'update')->name('cargos.update');
            Route::delete('eliminar/{id}', 'destroy')->name('cargos.destroy');
            Route::get('getCargos', 'getCargos')->name('cargos.getCargos');
            Route::get('getCargosTodos', 'getCargosTodos')->name('cargos.getCargosTodos');
            Route::get('getAreas', 'getAreas')->name('cargos.getAreas');
        });
        // ----------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Empleados
        Route::controller(EmpleadoController::class)->prefix('empleados')->group(function () {
            Route::get('', 'index')->name('empleados.index');
            Route::get('crear', 'create')->name('empleados.create');
            Route::get('editar/{id}', 'edit')->name('empleados.edit');
            Route::post('guardar', 'store')->name('empleados.store');
            Route::put('actualizar/{id}', 'update')->name('empleados.update');
            Route::delete('eliminar/{id}', 'destroy')->name('empleados.destroy');
            Route::put('activar/{id}', 'activar')->name('empleados.activar');
            Route::get('getCargos', 'getCargos')->name('empleados.getCargos');
            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
            Route::get('getEmpresas', 'getEmpresas')->name('empleados.getEmpresas');
            Route::get('getAreas', 'getAreas')->name('empleados.getAreas');
            Route::get('getCargos', 'getCargos')->name('empleados.getCargos');
            Route::get('getEmpleados', 'getEmpleados')->name('empleados.getEmpleados');

            // *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--* *--*
            Route::get('setDeshabilitarEmpleado', 'setDeshabilitarEmpleado')->name('empleados.setDeshabilitarEmpleado');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Unidades
        Route::controller(UnidadController::class)->prefix('unidades')->group(function () {
            Route::get('', 'index')->name('unidades.index');
            Route::get('crear', 'create')->name('unidades.create');
            Route::get('editar/{id}', 'edit')->name('unidades.edit');
            Route::post('guardar', 'store')->name('unidades.store');
            Route::put('actualizar/{id}', 'update')->name('unidades.update');
            Route::get('active', 'active')->name('unidades.active');
            Route::get('getUnidades', 'getUnidades')->name('unidades.getUnidades');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Tiempos
        Route::controller(TiempoController::class)->prefix('tiempos')->group(function () {
            Route::get('', 'index')->name('tiempos.index');
            Route::get('crear', 'create')->name('tiempos.create');
            Route::get('editar/{id}', 'edit')->name('tiempos.edit');
            Route::post('guardar', 'store')->name('tiempos.store');
            Route::put('actualizar/{id}', 'update')->name('tiempos.update');
            Route::get('active', 'active')->name('tiempos.active');
        });
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Productos
        Route::controller(ProductoController::class)->prefix('productos')->group(function () {
            Route::get('', 'index')->name('productos.index');
            Route::get('crear', 'create')->name('productos.create');
            Route::get('editar/{id}', 'edit')->name('productos.edit');
            Route::post('guardar', 'store')->name('productos.store');
            Route::put('actualizar/{id}', 'update')->name('productos.update');
            Route::get('active', 'active')->name('productos.active');
        });
        // ----------------------------------------------------------------------------------------
    });
    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    Route::middleware(Empleado::class)->group(function () {
        // ------------------------------------------------------------------------------------
        // Ruta Administrador del Sistema Areas
        Route::controller(FacturacionController::class)->prefix('facturacion')->group(function () {
            Route::get('', 'index')->name('facturacion.index');
            // ------------------------------------------------------------------------------------
            Route::controller(RegistroFactController::class)->prefix('registro')->group(function () {
                Route::get('', 'index')->name('facturacion.registro.index');
                Route::post('guardar', 'store')->name('facturacion.registro.store');
            });
            // ------------------------------------------------------------------------------------
        });
    });

    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *

    Route::get('/getEmpleadosChat', [PageController::class, 'getEmpleadosChat'])->name('getEmpleadosChat');
    Route::get('/getMensajesNuevosEmpleadosChat', [PageController::class, 'getMensajesNuevosEmpleadosChat'])->name('getMensajesNuevosEmpleadosChat');
    Route::post('/setNuevoMensaje', [PageController::class, 'setNuevoMensaje'])->name('setNuevoMensaje');
    Route::get('/getMensajesChatUsuario', [PageController::class, 'getMensajesChatUsuario'])->name('getMensajesChatUsuario');
    Route::get('/getMensajesNuevosDestinatarioChat', [PageController::class, 'getMensajesNuevosDestinatarioChat'])->name('getMensajesNuevosDestinatarioChat');
    // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
    Route::get('/getNotificacionesEmpleado', [PageController::class, 'getNotificacionesEmpleado'])->name('getNotificacionesEmpleado');
});
