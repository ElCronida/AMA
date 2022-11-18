<?php

namespace App\Repositories\Disciplina;

use App\Models\Disciplina;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DisciplinaRepository{
    public function getById($id){
        return Disciplina::find($id);
    }

    public function index(){
        return Disciplina::all();
    }

    public function store($disciplina){
        return Disciplina::insert($disciplina);
    }

    public function update($disciplina, $datos){
        return $disciplina->update($datos);
    }

    public function destroy($id){
        return Disciplina::destroy($id);
    }

    public function disciplinasParaLosSelect(){
        return Disciplina::all()->pluck('nombre','id');
    }

    public function numDisciplinas(){
        return Disciplina::all()->count();
    }

    //USUARIOS NORMALES
    public function numMisDisciplinas(){
        $disciplina = Disciplina::select(DB::raw('DISTINCT(disciplinas.id)'))->
            join('gimnasios_disciplinas','disciplinas.id', 'gimnasios_disciplinas.disciplina_id')->
            join('usuarios_gimnasios','usuarios_gimnasios.gimnasio_id','gimnasios_disciplinas.gimnasio_id')->
            where('usuarios_gimnasios.usuario_id', Auth::user()->id)->get();

        return count($disciplina);
    }

    public function verDisciplinasUsuario(){
        return Disciplina::select(DB::raw('DISTINCT(disciplinas.id) as id'), 'disciplinas.nombre as nombre')->
        join('gimnasios_disciplinas','disciplinas.id', 'gimnasios_disciplinas.disciplina_id')->
        join('usuarios_gimnasios','usuarios_gimnasios.gimnasio_id','gimnasios_disciplinas.gimnasio_id')->
        where('usuarios_gimnasios.usuario_id', Auth::user()->id)->get();
    }
}
