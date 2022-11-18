<?php

namespace App\Repositories\Arbitro;

use App\Models\Arbitro;
use Illuminate\Support\Facades\DB;

class ArbitroRepository{
    public function getById($id){
        return Arbitro::find($id);
    }

    public function index(){
        return Arbitro::all();
    }

    public function store($arbitro){
        return Arbitro::create($arbitro);
    }

    public function update($arbitro, $datos){
        return $arbitro->update($datos);
    }

    public function destroy($id){
        return Arbitro::destroy($id);
    }

    public function arbitrosSelect(){
        return Arbitro::query()->select(DB::raw('CONCAT_WS(" ", nombre,apellido1,apellido2) as nombre_completo, id'))->pluck('nombre_completo', 'id');
    }

    public function totalRegistros(){
        return Arbitro::all()->count();
    }
}
