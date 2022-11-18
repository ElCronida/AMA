@extends('adminlte::page')

@section('title', __('Inicio'))

@section('content_header')
    <h1>{{ __('Inicio') }}</h1>
@stop
@section('content')
    @include('flash-message')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <p>{{ __('Mis disciplinas') }}</p>
                            <p>{{ isset($numMisDisciplinas) ? $numMisDisciplinas : 'Error' }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-child text-light"></i>
                        </div>
                        <a href="{{ route('usuario.aamm.index') }}" class="small-box-footer">{{ __('Ir ') }}<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-3">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <p>{{ __('Mis gimnasios') }}</p>
                            <p>{{ isset($numMisGimnasios) ? $numMisGimnasios : 'Error' }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-university text-light"></i>
                        </div>
                        <a href="{{ route('usuario.gimnasios.index') }}" class="small-box-footer">{{ __('Ir ') }}<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-12">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <p>{{ __('Cursos disponibles') }}</p>
                            <p>{{ isset($numMisCursosDisponibles) ? $numMisCursosDisponibles : 'Error' }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-graduation-cap text-light"></i>
                        </div>
                        <a href="{{ route('usuario.cursos.index') }}" class="small-box-footer">{{ __('Ir ') }}<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <p>{{ __('Mi perfil') }}</p>

                        </div>
                        <div class="icon">
                            <i class="fas fa-users text-light"></i>
                        </div>
                        <a href="{{ route('usuario.perfil.edit') }}" class="small-box-footer">{{ __('Ir ') }}<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <p>{{ __('Cuota') }}</p>
                            <p>{{ isset($estadoCuotaUsuario) ? $estadoCuotaUsuario : 'Error' }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-credit-card text-light"></i>
                        </div>
                        <a href="#" class="small-box-footer">{{ __('Ir ') }}<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <p>{{ __('Campeonatos act.') }}</p>
                            <p>{{ isset($numCampeonatosDisponibles) ? $numCampeonatosDisponibles : 'Error' }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-trophy text-light"></i>
                        </div>
                        <a href="{{ route('usuario.campeonatos.index') }}" class="small-box-footer">{{ __('Ir ') }}<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <p>{{ __('Tienda') }}</p>
                            <p>{{ __('Cerrada') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-shopping-cart text-light"></i>
                        </div>
                        <a href="{{ route('tienda.index') }}" class="small-box-footer">{{ __('Ir ') }}<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6 col-12">
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <p>{{ __('Mis compañeros') }}</p>
                            <p>{{ isset($numMisComp) ? $numMisComp : 'Error' }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users text-light"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        $(document).ready(function (){

        });
    </script>
@stop
