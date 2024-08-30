@extends('intranet.layout.app')

@section('css_pagina')
@endsection

@section('titulo_pagina')
    <i class="fas fa-project-diagram mr-3" aria-hidden="true"></i> Módulo de Facturación
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('facturacion.index') }}">Facturación</a></li>
    <li class="breadcrumb-item active">Registrar</li>
@endsection

@section('titulo_card')
    Registro de facturación
@endsection

@section('botones_card')
@endsection

@section('cuerpo')
    @can('facturacion.registro.index')
        <div class="row d-flex justify-content-center">
            <form class="col-12 form-horizontal" action="{{ route('facturacion.registro.store') }}" method="POST"
                autocomplete="off" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-12 col-md-3 form-group" id="caja_empresas">
                        <label for="fecha">Fecha</label>
                        <input class="form-control form-control-sm" type="date" name="fecha" id="fecha" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="col-12 col-md-3 form-group" id="caja_empresas">
                        <label for="clinica_id">Clínica</label>
                        <select id="clinica_id" name="clinica_id" class="form-control form-control-sm" required>
                            <option value="">Elija clínica</option>
                            @foreach ($clinicas as $clinica)
                                <option value="{{ $clinica->id }}">{{ $clinica->clinica }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped table-hover table-sm  table-bordered tabla_data_table_inicial">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col" rowspan="2" style="white-space:nowrap;">Unidad</th>
                                    @foreach ($tiempos as $tiempo)
                                        <th class="text-center" scope="col" colspan="{{$clinica->unidades->count() + 1}}" style="white-space:nowrap;">{{$tiempo->tiempo}}</th>
                                    @endforeach
                                </tr>
                                <tr>
                                    @foreach ($tiempos as $tiempo)
                                        @foreach ($clinica->unidades as $unidad)
                                            <th class="text-center pl-3 pr-3" scope="col"  style="white-space:nowrap;">{{$unidad->unidad}}</th>
                                        @endforeach
                                        <th class="text-center pl-3 pr-3 d-flex align-items-center" scope="col"  style="white-space:nowrap;">Total</th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($productos as $producto)
                                <tr class="table-{{$producto->tipo=='DIETA'?'success':($producto->tipo=='NUEVES/ ONCES / REFR'?'warning':($producto->tipo=='DESECHABLES'?'secondary':'info'))}}">
                                    <td style="white-space:nowrap;">{{$producto->tipo .' - '.$producto->producto}}</td>
                                    @foreach ($tiempos as $tiempo)
                                        @foreach ($clinica->unidades as $unidad)
                                            <td class="text-center" style="white-space:nowrap;">
                                                <div class="form-group" id="caja_{{$producto->id}}_{{$tiempo->id}}_{{$unidad->id}}">
                                                    <label for="cantidad">Cantidad</label>
                                                    <input type="number" class="form-control form-control-sm text-center" value="0" min="0" name="cantidad_{{$producto->id}}_{{$tiempo->id}}_{{$unidad->id}}" id="{{$producto->id}}_{{$tiempo->id}}_{{$unidad->id}}">
                                                </div>
                                            </td>
                                        @endforeach
                                        <td class="text-center" style="white-space:nowrap;">
                                           <div class="row d-flex align-items-center justify-content-center">
                                            <div class="col-12 form-group">
                                                <label for="total">Total producto</label>
                                                <span class="form-control form-control-sm" id="total_{{$producto->id}}_{{$tiempo->id}}">0</span>
                                            </div>
                                           </div>
                                        </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row mt-5">
                    <div class="col-12 mb-4 mb-md-0 d-grid gap-2 d-md-block ">
                        <button type="submit" class="btn btn-primary btn-sm mini_sombra pl-sm-5 pr-sm-5"style="font-size: 0.8em;">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="row d-flex justify-content-center">
            <div class="col-12 col-md-6">
                <div class="alert alert-warning alert-dismissible mini_sombra">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Sin Acceso!</h5>
                    <p style="text-align: justify">Su usuario no tiene permisos de acceso para esta vista, Comuniquese con el administrador del sistema.</p>
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
    @include('intranet.layout.data_table')
    <script src="{{ asset('js/intranet/facturacion/registrar/index.js') }}"></script>
@endsection
