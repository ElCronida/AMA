@extends('adminlte::page')

@section('title', __('Usuarios | Editar'))

@section('content_header')
    <h1>{{ __('Usuarios') }}</h1>
@stop
@section('content')
    <div class="card card-outline card-danger">
        <div class="card-header">
            <div class="row justify-content-end">
                <div class="btn-group">
                    @if(\Auth::user()->id == $usuario->id)
                        <a href="{{ route('admin.index') }}" class="btn btn-dark btn-sm"><span class="fa fa-reply"></span><br>{{__('Volver')}}</a>
                    @else
                        <a href="{{ route('admin.usuarios.index') }}" class="btn btn-dark btn-sm"><span class="fa fa-reply"></span><br>{{__('Volver')}}</a>
                    @endif
                </div>
            </div>
        </div>

        {{ Form::open(array('class' => 'form-horizontal', 'method' => 'post' , 'route' => array('admin.usuarios.update', $usuario->id))) }}
            {{ method_field('PUT') }}
            {{ Form::token() }}
            @include('admin.usuarios._form')
        {{ Form::close() }}
    </div>
@stop

@section('js')
<script>
    $(document).ready(function(){

    });
</script>
@stop
