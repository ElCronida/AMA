<?php

namespace App\Repositories\Campeonato;

use App\Models\Campeonato;
use Carbon\Carbon;

class CampeonatoRepository{
    public function getById($id){
        return Campeonato::find($id);
    }

    public function index(){
        return Campeonato::all();
    }

    public function store($campeonato){
        return Campeonato::create($campeonato);
    }

    public function update($campeonato, $datos){
        return $campeonato->update($datos);
    }

    public function destroy($id){
        return Campeonato::destroy($id);
    }

    public function totalRegistros(){
        return Campeonato::all()->count();
    }

    public function numCampeonatosDisponibles(){
        return Campeonato::query()->whereDate('fecha_ini', '>', Carbon::now()->timezone('Europe/Madrid')->format('Y-m-d'))->count();
    }
    public function verCampeonatosDisponibles(){
        return Campeonato::query()->whereDate('fecha_ini', '>', Carbon::now()->timezone('Europe/Madrid')->format('Y-m-d'))->get();
    }
}
