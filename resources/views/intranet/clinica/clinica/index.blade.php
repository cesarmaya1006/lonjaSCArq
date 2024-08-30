@extends('intranet.layout.app')

@section('css_pagina')

@endsection

@section('titulo_pagina')
    <i class="fas fa-hospital-symbol mr-3" aria-hidden="true"></i> Configuración Clinicas
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Clinicas</li>
@endsection

@section('titulo_card')
    Listado de Clínicas
@endsection

@section('botones_card')
    <a href="{{ route('clinicas.create') }}"
        class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
        <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
        Nuevo registro
    </a>
@endsection

@section('cuerpo')
    <div class="row" id="caja_tabla_clinicas">
        <div class="col-12">
            <div class="col-12">
                @csrf @method('delete')
                <div class="col-12">
                    <table class="table display table-striped table-hover table-sm  tabla-borrando tabla_data_table_inicial_opt"
                           id="tablaClinicas"
                           data_titulo="Listado de Clínicas"
                           data_pageLength="5">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th>Clínica</th>
                                <th>Correo Electrónico</th>
                                <th>Teléfono</th>
                                <th>Dirección</th>
                                <th>Contacto</th>
                                <th>Cargo Contacto</th>
                                <th>Estado</th>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody id="tbody_clinicas">
                            @foreach ($clinicas as $clinica)
                            <tr>
                                <td>{{$clinica->id}}</td>
                                <td>{{$clinica->clinica}}</td>
                                <td>{{$clinica->email}}</td>
                                <td>{{$clinica->telefono}}</td>
                                <td>{{$clinica->direccion}}</td>
                                <td>{{$clinica->contacto}}</td>
                                <td>{{$clinica->cargo}}</td>
                                <td><span class="badge bg-{{$clinica->estado==1?'success':'danger'}}">{{$clinica->estado==1?'Activa':'Inactiva'}}</span></td>
                                <td>
                                    <a href="{{ route('clinicas.edit', ['id' => $clinica->id]) }}"
                                        class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <form action="{{ route('clinicas.destroy', ['id' => $clinica->id]) }}" class="d-inline form-eliminar" method="POST">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                            title="Eliminar este registro">
                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_card')
@endsection

@section('modales')
@endsection

@section('scripts_pagina')
    @include('intranet.layout.data_table')
@endsection
