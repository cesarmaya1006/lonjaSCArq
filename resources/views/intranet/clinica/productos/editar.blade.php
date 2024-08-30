@extends('intranet.layout.app')

@section('css_pagina')
@endsection

@section('titulo_pagina')
    <i class="fas fa-drumstick-bite mr-3" aria-hidden="true"></i> Configuración Productos y Servicios
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Productos y Servicios</a></li>
    <li class="breadcrumb-item active">Productos y Servicios - Editar</li>
@endsection

@section('titulo_card')
    <i class="fa fa-edit mr-3" aria-hidden="true"></i> Editar Producto / Servicio
@endsection

@section('botones_card')
    <a href="{{route('productos.index')}}" class="btn btn-success btn-sm mini_sombra pl-5 pr-5 float-md-end" style="font-size: 0.8em;">
        <i class="fas fa-reply mr-2"></i>
        Volver
    </a>
@endsection

@section('cuerpo')
@if (isset($producto_edit))
    <div class="row mb-3">
        <div class="col-12 col-md-3">
            <div class="d-grid gap-2">
                <span class="btn btn-secondary btn-xs" id="BotonActivar" data_id="{{$producto_edit->id}}" data_url="{{route('productos.active')}}">{{$producto_edit->estado ==1?'Desactivar':'Activar'}}</span>
            </div>
        </div>
    </div>
@endif
<div class="row d-flex justify-content-center">
    <form class="col-12 form-horizontal" action="{{ route('productos.update',['id'=>$producto_edit]) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('put')
        @include('intranet.clinica.productos.form')
        <div class="row mt-5">
            <div class="col-12 mb-4 mb-md-0 d-grid gap-2 d-md-block ">
                <button type="submit" class="btn btn-primary btn-sm mini_sombra pl-sm-5 pr-sm-5" style="font-size: 0.8em;">Actualizar</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('footer_card')
@endsection

@section('modales')
@endsection

@section('scripts_pagina')
<script src="{{ asset('js/intranet/empresa/productos/editar.js') }}"></script>
@endsection
