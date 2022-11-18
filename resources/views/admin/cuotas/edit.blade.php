@extends('adminlte::page')

@section('title', __('Cuotas | Editar'))

@section('content_header')
    <h1>{{ __('Cuotas') }}</h1>
@stop
@section('content')
    <div class="card card-outline card-danger">
        <div class="card-header">
            <div class="row justify-content-end">
                <div class="btn-group">
                    <a href="{{ route('admin.cuotas.index') }}" class="btn btn-dark btn-sm"><span class="fa fa-reply"></span><br>{{__('Volver')}}</a>
                </div>
            </div>
        </div>

        {{ Form::open(array('class' => 'form-horizontal', 'method' => 'post' , 'route' => array('admin.cuotas.update', $cuota->id))) }}
            {{ method_field('PUT') }}
            {{ Form::token() }}
            @include('admin.cuotas._form')
        {{ Form::close() }}
    </div>
@stop

@section('js')
<script>
    $(document).ready(function(){

    });
</script>
@stop
