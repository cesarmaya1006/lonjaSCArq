@extends('intranet.layout.app')

@section('css_pagina')

@endsection

@section('titulo_pagina')
    <i class="fas fa-project-diagram mr-3" aria-hidden="true"></i> Configuración Tiempos
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Tiempos</li>
@endsection

@section('titulo_card')
    Listado de Tiempos
@endsection

@section('botones_card')
    @can('tiempos.create')
        <a href="{{ route('tiempos.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
            <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
            Nuevo registro
        </a>
    @endcan
@endsection

@section('cuerpo')
    @can('tiempos.index')
        <div class="row d-flex justify-content-md-center">
            <div class="col-12 col-md-6 table-responsive">
                <table class="table display table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Tiempo</th>
                            <th class="text-center">Estado</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tiempos as $tiempo)
                            <tr>
                                <td>{{$tiempo->id}}</td>
                                <td>{{$tiempo->tiempo}}</td>
                                <td><span class="badge bg-{{$tiempo->estado==1?'success':'danger'}}">{{$tiempo->estado==1?'Activo':'Inactivo'}}</span></td>
                                <td>
                                    <a href="{{ route('tiempos.edit', ['id' => $tiempo->id]) }}"
                                        class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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

@endsection
