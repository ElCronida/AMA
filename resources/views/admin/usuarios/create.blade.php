@extends('adminlte::page')

@section('title', __('Usuarios | Añadir'))

@section('content_header')
    <h1>{{ __('Usuarios') }}</h1>
@stop
@section('content')
    <div class="card card-outline card-danger">
        <div class="card-header">
            <div class="row justify-content-end">
                <div class="btn-group">
                    <a href="{{ route('admin.usuarios.index') }}" class="btn btn-dark btn-sm"><span class="fa fa-reply"></span><br>{{__('Volver')}}</a>
                </div>
            </div>
        </div>

        {{ Form::open(array('class' => 'form-horizontal', 'method' => 'post' , 'route' => 'admin.usuarios.store')) }}
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
