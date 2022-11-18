<?php

namespace App\Repositories\Reglamento;

use App\Models\Reglamento;

class ReglamentoRepository{
    public function getById($id){
        return Reglamento::find($id);
    }

    public function index(){
        return Reglamento::all();
    }

    public function store($reglamento){
        return Reglamento::insert($reglamento);
    }

    public function update($reglamento, $datos){
        return $reglamento->update($datos);
    }

    public function destroy($id){
        return Reglamento::destroy($id);
    }

    public function reglamentosSelect(){
        return Reglamento::all()->pluck('nombre','id');
    }

    public function totalRegistros(){
        return Reglamento::all()->count();
    }
}
