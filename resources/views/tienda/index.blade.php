@extends('adminlte::page')

@section('title', __('Tienda'))

@section('content_header')
    <h1>{{ __('Tienda') }}</h1>
@stop
@section('content')
    <div class="row col-12 justify-content-center">
        <picture>
            <img src="{{\Storage::url('public/trabajando.png')}}" class="img-fluid" alt="imagen de tienda en desarrollo">
        </picture>
    </div>
@stop

