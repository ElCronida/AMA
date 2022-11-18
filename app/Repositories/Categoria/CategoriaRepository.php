<?php

namespace App\Repositories\Categoria;

use App\Models\Categoria;

class CategoriaRepository{
    public function getById($id){
        return Categoria::find($id);
    }

    public function index(){
        return Categoria::all();
    }

    public function store($categoria){
        return Categoria::insert($categoria);
    }

    public function update($categoria, $datos){
        return $categoria->update($datos);
    }

    public function destroy($id){
        return Categoria::destroy($id);
    }

    public function categoriasSelect(){
        return Categoria::all()->pluck('nombre','id');
    }

    public function totalRegistros(){
        return Categoria::all()->count();
    }
}
