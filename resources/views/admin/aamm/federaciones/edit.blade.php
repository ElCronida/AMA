@extends('adminlte::page')

@section('title', __('Federaciones | Editar'))

@section('content_header')
    <h1>{{ __('Federaciones') }}</h1>
@stop
@section('content')
    <div class="card card-outline card-danger">
        <div class="card-header">
            <div class="row justify-content-end">
                <div class="btn-group">
                    <a href="{{ route('admin.federaciones.index') }}" class="btn btn-dark btn-sm"><span class="fa fa-reply"></span><br>{{__('Volver')}}</a>
                </div>
            </div>
        </div>

        {{ Form::open(array('class' => 'form-horizontal', 'method' => 'post' , 'route' => array('admin.federaciones.update', $federacion->id))) }}
            {{ method_field('PUT') }}
            {{ Form::token() }}
            @include('admin.aamm.federaciones._form')
        {{ Form::close() }}
    </div>
@stop

@section('js')

@stop
