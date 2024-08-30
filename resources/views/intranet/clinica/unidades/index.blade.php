@extends('intranet.layout.app')

@section('css_pagina')

@endsection

@section('titulo_pagina')
    <i class="fas fa-project-diagram mr-3" aria-hidden="true"></i> Configuración Unidades
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Unidades</li>
@endsection

@section('titulo_card')
    Listado de Unidades
@endsection

@section('botones_card')
    @can('unidades.create')
        <a href="{{ route('unidades.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
            <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
            Nuevo registro
        </a>
    @endcan
@endsection

@section('cuerpo')
    @can('unidades.index')
        @if (session('rol_principal_id')<3)
        <div class="row">
            <div class="col-12 col-md-3 form-group" id="caja_clinicas">
                <label for="clinica_id">Clínica</label>
                <select id="clinica_id" class="form-control form-control-sm" data_url="{{ route('unidades.getUnidades') }}">
                    <option value="">Elija Clínica</option>
                    @foreach ($clinicas as $clinica)
                        <option value="{{ $clinica->id }}">
                            {{ $clinica->clinica }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <hr>
        @endif
        <div class="row d-flex justify-content-md-center">
            <input type="hidden" name="titulo_tabla" id="titulo_tabla" value="Listado de Áreas">
            <input type="hidden" id="control_dataTable" value="1">
            <input type="hidden" id="unidades_edit" data_url="{{ route('unidades.edit', ['id' => 1]) }}">
            <input type="hidden" id="unidades_active" data_url="{{ route('unidades.active', ['id' => 1]) }}">
            @csrf @method('delete')
            <div class="col-12 col-md-6 table-responsive">
                <table class="table display table-striped table-hover table-sm  tabla-borrando tabla_data_table" id="tablaUnidades">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Unidad</th>
                            <th class="text-center">Estado</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="tbody_unidades">

                    </tbody>
                </table>
            </div>
        </div>
        @can('unidades.edit')
        <input type="hidden" id="permiso_unidades_edit" value="1">
        @else
        <input type="hidden" id="permiso_unidades_edit" value="0">
        @endcan
        @can('unidades.active')
        <input type="hidden" id="permiso_unidades_active" value="1">
        @else
        <input type="hidden" id="permiso_unidades_active" value="0">
        @endcan
    @else
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <div class="alert alert-warning alert-dismissible mini_sombra">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Sin Acceso!</h5>
                    <p style="text-align: justify">Su usuario no tiene permisos de acceso para esta vista, Comuniquese con el
                        administrador del sistema.</p>
                </div>
            </div>
        </div>
    @endcan
@endsection

@section('footer_card')
@endsection

@section('modales')
    <!-- Modales  -->

    <!-- Fin Modales  -->
@endsection

@section('scripts_pagina')
    <!-- = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = -->
    @include('intranet.layout.data_table')
    <script src="{{ asset('js/intranet/configuracion/unidades/index.js') }}"></script>
@endsection
