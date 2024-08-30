@extends('intranet.layout.app')

@section('css_pagina')
@endsection

@section('titulo_pagina')
    <i class="fas fa-drumstick-bite mr-3" aria-hidden="true"></i> Configuración Productos y Servicios
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Productos/Servicios</li>
@endsection

@section('titulo_card')
    Productos y Servicios
@endsection

@section('botones_card')
    @can('productos.create')
        <a href="{{ route('productos.create') }}" class="btn btn-primary btn-xs btn-sombra text-center pl-5 pr-5 float-md-end">
            <i class="fa fa-plus-circle mr-3" aria-hidden="true"></i>
            Nuevo registro
        </a>
    @endcan
@endsection

@section('cuerpo')
    @can('productos.index')
        <div class="row d-flex justify-content-md-center">
            <div class="col-12">
                <div class="row d-flex justify-content-md-center">
                    <div class="col-12">
                        <h5>DIETAS</h5>
                    </div>
                    <div class="col-12 col-md-8 table-responsive">
                        <table class="table display table-striped table-hover table-sm table-bordered tabla_data_table_inicial_opt">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Estado</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos->where('tipo', 'DIETA') as $producto)
                                    <tr>
                                        <td class="text-center">{{ $producto->id }}</td>
                                        <td style="white-space:nowrap;">{{ $producto->producto }}</td>
                                        <td class="text-right">$ {{ number_format($producto->costo, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-{{ $producto->estado == 1 ? 'success' : 'danger' }}">{{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('productos.edit', ['id' => $producto->id]) }}"
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
                <hr>
                <div class="row d-flex justify-content-md-center">
                    <div class="col-12">
                        <h5>NUEVES/ ONCES / REFRIGERIOS</h5>
                    </div>
                    <div class="col-12 col-md-8 table-responsive">
                        <table class="table display table-striped table-hover table-sm table-bordered tabla_data_table_inicial_opt">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Estado</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos->where('tipo', 'NUEVES/ ONCES / REFR') as $producto)
                                    <tr>
                                        <td class="text-center">{{ $producto->id }}</td>
                                        <td style="white-space:nowrap;">{{ $producto->producto }}</td>
                                        <td class="text-right">$ {{ number_format($producto->costo, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-{{ $producto->estado == 1 ? 'success' : 'danger' }}">{{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('productos.edit', ['id' => $producto->id]) }}"
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
                <hr>
                <div class="row d-flex justify-content-md-center">
                    <div class="col-12">
                        <h5>DESECHABLES</h5>
                    </div>
                    <div class="col-12 col-md-8 table-responsive">
                        <table class="table display table-striped table-hover table-sm table-bordered tabla_data_table_inicial_opt">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Estado</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos->where('tipo', 'DESECHABLES') as $producto)
                                    <tr>
                                        <td class="text-center">{{ $producto->id }}</td>
                                        <td style="white-space:nowrap;">{{ $producto->producto }}</td>
                                        <td class="text-right">$ {{ number_format($producto->costo, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-{{ $producto->estado == 1 ? 'success' : 'danger' }}">{{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('productos.edit', ['id' => $producto->id]) }}"
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
                <hr>
                <div class="row d-flex justify-content-md-center">
                    <div class="col-12">
                        <h5>ADICIONALES</h5>
                    </div>
                    <div class="col-12 col-md-8 table-responsive">
                        <table class="table display table-striped table-hover table-sm table-bordered tabla_data_table_inicial_opt">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Producto</th>
                                    <th class="text-center">Costo</th>
                                    <th class="text-center">Estado</th>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($productos->where('tipo', 'ADICIONALES') as $producto)
                                    <tr>
                                        <td class="text-center">{{ $producto->id }}</td>
                                        <td style="white-space:nowrap;">{{ $producto->producto }}</td>
                                        <td class="text-right">$ {{ number_format($producto->costo, 2, '.', ',') }}</td>
                                        <td class="text-center">
                                            <span class="badge bg-{{ $producto->estado == 1 ? 'success' : 'danger' }}">{{ $producto->estado == 1 ? 'Activo' : 'Inactivo' }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('productos.edit', ['id' => $producto->id]) }}"
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
    @include('intranet.layout.data_table')
@endsection
