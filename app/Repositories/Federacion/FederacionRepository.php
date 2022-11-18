<?php

namespace App\Repositories\Federacion;

use App\Models\Federacion;

class FederacionRepository{
    public function getById($id){
        return Federacion::find($id);
    }

    public function index(){
        return Federacion::all();
    }

    public function store($federacion){
        return Federacion::insert($federacion);
    }

    public function update($federacion, $datos){
        return $federacion->update($datos);
    }

    public function destroy($id){
        return Federacion::destroy($id);
    }

    public function totalRegistros(){
        return Federacion::all()->count();
    }

    public function federacionesSelect(){
        return Federacion::all()->pluck('nombre','id');
    }
}
