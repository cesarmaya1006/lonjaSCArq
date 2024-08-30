@extends('intranet.layout.app')

@section('css_pagina')
@endsection

@section('titulo_pagina')
    <i class="fas fa-project-diagram mr-3" aria-hidden="true"></i> Configuración Unidades
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item"><a href="{{ route('unidades.index') }}">Unidades</a></li>
    <li class="breadcrumb-item active">Unidades - Crear</li>
@endsection

@section('titulo_card')
    <i class="fa fa-plus-square mr-3" aria-hidden="true"></i> Crear Unidad
@endsection

@section('botones_card')
    <a href="{{route('unidades.index')}}" class="btn btn-success btn-sm mini_sombra pl-5 pr-5 float-md-end" style="font-size: 0.8em;">
        <i class="fas fa-reply mr-2"></i>
        Volver
    </a>
@endsection

@section('cuerpo')
<div class="row d-flex justify-content-center">
    <form class="col-12 form-horizontal" action="{{ route('unidades.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('post')
        @include('intranet.clinica.unidades.form')
        <div class="row mt-5">
            <div class="col-12 mb-4 mb-md-0 d-grid gap-2 d-md-block ">
                <button type="submit" class="btn btn-primary btn-sm mini_sombra pl-sm-5 pr-sm-5" style="font-size: 0.8em;">Guardar</button>
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
<script src="{{ asset('js/intranet/configuracion/unidades/crear.js') }}"></script>
@endsection
