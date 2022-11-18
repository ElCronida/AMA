<?php

namespace App\Repositories\Gimnasio;

use App\Models\Gimnasio;
use Illuminate\Support\Facades\Auth;

class GimnasioRepository{
    public function getById($id){
        return Gimnasio::find($id);
    }

    public function index(){
        return Gimnasio::all();
    }

    public function store($gimnasio){
        return Gimnasio::create($gimnasio);
    }

    public function update($gimnasio, $datos){
        return $gimnasio->update($datos);
    }

    public function destroy($id){
        return Gimnasio::destroy($id);
    }

    public function gimnasiosSelect(){
        return Gimnasio::all()->pluck('nombre','id');
    }

    public function totalRegistros(){
        return Gimnasio::all()->count();
    }

    //USUARIOS NORMALES
    public function numMisGimnasios(){
        return Gimnasio::join('usuarios_gimnasios','usuarios_gimnasios.gimnasio_id','gimnasios.id')->
        where('usuarios_gimnasios.usuario_id', Auth::user()->id)->count();
    }

    public function verGimnasiosUsuario(){
        return Gimnasio::select('gimnasios.nombre as nombre','gimnasios.direccion as direccion', 'gimnasios.telefono as telefono', 'gimnasios.email as email')->
        join('usuarios_gimnasios','usuarios_gimnasios.gimnasio_id','gimnasios.id')->
        where('usuarios_gimnasios.usuario_id', Auth::user()->id)->get();
    }
}
