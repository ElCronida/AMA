@extends('adminlte::page')

@section('title', __('Categorias | Editar'))

@section('content_header')
    <h1>{{ __('Categorias') }}</h1>
@stop
@section('content')
    <div class="card card-outline card-danger">
        <div class="card-header">
            <div class="row justify-content-end">
                <div class="btn-group">
                    <a href="{{ route('admin.categorias.index') }}" class="btn btn-dark btn-sm"><span class="fa fa-reply"></span><br>{{__('Volver')}}</a>
                </div>
            </div>
        </div>

        {{ Form::open(array('class' => 'form-horizontal', 'method' => 'post' , 'route' => array('admin.categorias.update', $categoria->id))) }}
            {{ method_field('PUT') }}
            {{ Form::token() }}
            @include('admin.tienda.categorias._form')
        {{ Form::close() }}
    </div>
@stop

@section('js')
<script>
    $(document).ready(function(){

    });
</script>
@stop
