@extends('intranet.layout.app')

@section('css_pagina')

@endsection

@section('titulo_pagina')
    <i class="fas fa-project-diagram mr-3" aria-hidden="true"></i> Configuración Áreas
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Áreas</li>
@endsection

@section('titulo_card')
    Listado de Áreas
@endsection

@section('botones_card')
    @can('areas.create')
        <a href="{{ route('areas.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
            <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
            Nuevo registro
        </a>
    @endcan
@endsection

@section('cuerpo')
    @can('areas.index')
        @if (session('rol_principal_id')<3)
        <div class="row">
            <div class="col-12 col-md-3 form-group" id="caja_clinicas">
                <label for="clinica_id">Clínica</label>
                <select id="clinica_id" class="form-control form-control-sm" data_url="{{ route('areas.getAreas') }}">
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
            <input type="hidden" id="areas_edit" data_url="{{ route('areas.edit', ['id' => 1]) }}">
            <input type="hidden" id="areas_destroy" data_url="{{ route('areas.destroy', ['id' => 1]) }}">
            <input type="hidden" id="id_areas_getDependencias" data_url = "{{ route('areas.getDependencias', ['id' => 1]) }}">
            @csrf @method('delete')
            <div class="col-12 col-md-6 table-responsive">
                <table class="table display table-striped table-hover table-sm  tabla-borrando tabla_data_table" id="tablaAreas">
                    <thead>
                        <tr>
                            <th class="text-center">Id</th>
                            <th class="text-center">Area</th>
                            <th class="text-center">Area Superior</th>
                            <th class="text-center">Dependencias</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="tbody_areas">
                        @if (session('rol_principal_id')>2)
                            @foreach ($clinicas as $clinica)
                                @if ($clinica->id == session('clinica_id'))
                                    @foreach ($clinica->areas as $area)
                                        <tr>
                                            <td class="text-center">{{$area->id}}</td>
                                            <td>{{$area->area}}</td>
                                            <td class="text-center">{{$area->area_id?$area->area_sup->area:'---'}}</td>
                                            <td class="text-center">
                                                @if ($area->areas->count() >0)
                                                    <button type="submit" class="btn-accion-tabla tooltipsC mostrar_dependencias text-info"
                                                            onClick="mostrarModal('{{ route('areas.getDependencias', ['id' => $area->id]) }}')"
                                                            title="Mostrar Dependencias" data_id ="{{$area->id}}"
                                                            data_url = "{{ route('areas.getDependencias', ['id' => $area->id]) }}">
                                                            {{$area->areas->count()}}
                                                        </button>
                                                @else
                                                    <h6 class="text-danger">---</h6>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-evenly align-items-center">
                                                @can('areas.edit')
                                                    <a href="{{ route('areas.edit', ['id' => $area->id]) }}"
                                                        class="btn-accion-tabla tooltipsC" title="Editar este registro">
                                                        <i class="fas fa-pen-square"></i>
                                                    </a>
                                                @endcan
                                                @can('areas.destroy')
                                                    <form action="{{ route('areas.destroy', ['id' => $area->id]) }}" class="d-inline form-eliminar" method="POST">
                                                        @csrf
                                                        @method("delete")
                                                        <button type="submit" class="btn-accion-tabla eliminar tooltipsC"
                                                            title="Eliminar este registro">
                                                            <i class="fa fa-fw fa-trash text-danger"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        @can('areas.edit')
        <input type="hidden" id="permiso_areas_edit" value="1">
        @else
        <input type="hidden" id="permiso_areas_edit" value="0">
        @endcan
        @can('areas.destroy')
        <input type="hidden" id="permiso_areas_destroy" value="1">
        @else
        <input type="hidden" id="permiso_areas_destroy" value="0">
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
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listado de dependencias</h5>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar Lista</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Modales  -->
@endsection

@section('scripts_pagina')
    @include('intranet.layout.data_table')
    <script src="{{ asset('js/intranet/configuracion/areas/index.js') }}"></script>
@endsection
