@extends('adminlte::page')

@section('title', __('Marcas | Añadir'))

@section('content_header')
    <h1>{{ __('Marcas') }}</h1>
@stop
@section('content')
    <div class="card card-outline card-danger">
        <div class="card-header">
            <div class="row justify-content-end">
                <div class="btn-group">
                    <a href="{{ route('admin.marcas.index') }}" class="btn btn-dark btn-sm"><span class="fa fa-reply"></span><br>{{__('Volver')}}</a>
                </div>
            </div>
        </div>

        {{ Form::open(array('class' => 'form-horizontal', 'method' => 'post' , 'route' => 'admin.marcas.store')) }}
            @include('admin.tienda.marcas._form')
        {{ Form::close() }}
    </div>
@stop

@section('js')
<script>
    $(document).ready(function(){

    });
</script>
@stop
