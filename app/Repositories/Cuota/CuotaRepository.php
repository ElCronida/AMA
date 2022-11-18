<?php

namespace App\Repositories\Cuota;

use App\Models\Cuota;
use App\Models\UsuarioCuota;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CuotaRepository{
    public function getById($id){
        return Cuota::find($id);
    }

    public function index(){
        return Cuota::all();
    }

    public function store($cuota){
        return Cuota::insert($cuota);
    }

    public function update($cuota, $datos){
        return $cuota->update($datos);
    }

    public function destroy($id){
        return Cuota::destroy($id);
    }

    public function totalRegistros(){
        return Cuota::all()->count();
    }

    //USUARIOS NORMALES
    public function estadoCuotaUsuario(){
        return UsuarioCuota::query()->whereDate('fecha_fin', '>',Carbon::now()->timezone('Europe/Madrid')->format('Y-m-d'))->
            where('usuario_id',Auth::user()->id)->count();
    }
}
