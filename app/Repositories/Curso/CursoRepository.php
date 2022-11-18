<?php

namespace App\Repositories\Curso;

use App\Models\Curso;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CursoRepository{
    public function getById($id){
        return Curso::find($id);
    }

    public function index(){
        return Curso::join('gimnasios','gimnasios.id','cursos.gimnasio_id')->
            select(
                'cursos.id as id',
                'cursos.nombre as nombre',
                'cursos.fecha_ini as fecha_ini',
                'cursos.fecha_fin as fecha_fin',
                'cursos.hora_ini as hora_ini',
                'cursos.hora_fin as hora_fin',
                'cursos.precio as precio',
                'gimnasios.nombre as gimnasio',
            )->get();
    }

    public function store($curso){
        return Curso::insert($curso);
    }

    public function update($curso, $datos){
        return $curso->update($datos);
    }

    public function destroy($id){
        return Curso::destroy($id);
    }

    public function totalRegistros(){
        return Curso::all()->count();
    }

    //USUARIOS NORMALES
    public function numMisCursosDisponibles(){
        return Curso::join('gimnasios','cursos.gimnasio_id','gimnasios.id')->
            whereDate('cursos.fecha_ini', '>',Carbon::now()->timezone('Europe/Madrid')->format('Y-m-d'))->count();
    }

    public function verCursosDisponiblesUsuario(){
        return Curso::select(
                'cursos.nombre as nombreCurso',
                'cursos.precio as precioCurso',
                'cursos.fecha_ini as fecha_iniCurso',
                'cursos.fecha_fin as fecha_finCurso',
                'cursos.hora_ini as hora_iniCurso',
                'cursos.hora_fin as hora_finCurso',
                'gimnasios.nombre as nombreGimnasio',
                'gimnasios.direccion as direccionGimnasio',
                'gimnasios.cod_postal as cod_postalGimnasio',
                'gimnasios.telefono as telefonoGimnasio',
                'gimnasios.email as emailGimnasio'
            )->
            join('gimnasios','cursos.gimnasio_id','gimnasios.id')->
            whereDate('cursos.fecha_ini', '>',Carbon::now()->timezone('Europe/Madrid')->format('Y-m-d'))->get();
    }
}
