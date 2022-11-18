<?php

namespace App\Repositories\Estilo;

use App\Models\Estilo;

class EstiloRepository{
    public function getById($id){
        return Estilo::find($id);
    }

    public function index(){
        return Estilo::query()->
            join('disciplinas','disciplinas.id','estilos.disciplina_id')->
            select('estilos.id as estiloId','estilos.nombre as nombreEstilo','disciplinas.nombre as nombreDisciplina')->
            get();
    }

    public function store($estilo){
        return Estilo::insert($estilo);
    }

    public function update($estilo, $datos){
        return $estilo->update($datos);
    }

    public function destroy($id){
        return Estilo::destroy($id);
    }

    public function numEstilos(){
        return Estilo::all()->count();
    }
}
