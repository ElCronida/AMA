<?php

namespace App\Repositories\Marca;

use App\Models\Marca;

class MarcaRepository{
    public function getById($id){
        return Marca::find($id);
    }

    public function index(){
        return Marca::all();
    }

    public function store($marca){
        return Marca::insert($marca);
    }

    public function update($marca, $datos){
        return $marca->update($datos);
    }

    public function destroy($id){
        return Marca::destroy($id);
    }

    public function marcasSelect(){
        return Marca::all()->pluck('nombre','id');
    }

    public function totalRegistros(){
        return Marca::all()->count();
    }
}
