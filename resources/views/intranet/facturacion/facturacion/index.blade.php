@extends('intranet.layout.app')

@section('css_pagina')
@endsection

@section('titulo_pagina')
    <i class="fas fa-project-diagram mr-3" aria-hidden="true"></i> Módulo de Facturación
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
    <li class="breadcrumb-item active">Facturación</li>
@endsection

@section('titulo_card')
    Facturación
@endsection

@section('botones_card')
@endsection

@section('cuerpo')
    @can('facturacion.index')
        <div class="row">
            @can('facturacion.registro.index')
                <div class="col-12 col-md-3">
                    <div class="small-box bg-dark mini_sombra" style="border: 1px solid white">
                        <div class="inner">
                            <h5>Registrar facturacíon</h5>
                            <br>
                            <br>
                        </div>
                        <div class="icon text-white">
                            <i class="fas fa-hand-holding-usd"></i>
                        </div>
                        <a href="{{route('facturacion.registro.index')}}" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endcan
            <div class="col-12 col-md-3">
                <div class="small-box bg-primary mini_sombra">
                    <div class="inner">
                        <h5>Ver facturación</h5>
                        <br>
                        <br>
                    </div>
                    <div class="icon text-white">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <a href="#" class="small-box-footer">Acceder <i class="fas fa-arrow-circle-right"></i></a>
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
    <script src="{{ asset('js/intranet/facturacion/facturacion/index.js') }}"></script>
@endsection
