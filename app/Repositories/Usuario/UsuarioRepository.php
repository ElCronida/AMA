<?php

namespace App\Repositories\Usuario;

use App\Models\User;
use App\Models\Gimnasio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsuarioRepository{
    public function getById($id){
        return User::find($id);
    }

    public function index(){
        return User::query()->where('id','<>',Auth::user()->id)->get();
    }

    public function store($usuario){
        return User::create($usuario);
    }

    public function update($usuario, $datos){
        return $usuario->update($datos);
    }

    public function destroy($id){
        return User::destroy($id);
    }

    public function usuarioEnGimnasios($idGimnasio){
        return User::join('usuarios_gimnasios','usuarios_gimnasios.usuario_id','users.id')->
            where('usuarios_gimnasios.gimnasio_id',$idGimnasio)->
            get();
    }

    public function totalRegistros(){
        return User::all()->where('tipo', User::USUARIO_NORMAL)->where('activo',true)->count();
    }

    public function registroPorMeses(){
        return User::query()->select(DB::raw('COUNT(id) as total, Month(created_at) as mes'))->whereYear('created_at',date('Y'))->groupBy(DB::raw('Month(created_at)'))->get();
    }

    //USUARIOS NORMALES
    public function numMisComp(){
        $gimnasios_id = Gimnasio::select('gimnasios.id')->
            join('usuarios_gimnasios', 'usuarios_gimnasios.gimnasio_id','gimnasios.id')->where('usuarios_gimnasios.usuario_id', Auth::user()->id)->get()->toArray();
        if($gimnasios_id != null){
            if(is_array($gimnasios_id)){
                return User::join('usuarios_gimnasios','usuarios_gimnasios.usuario_id','users.id')->whereIn('usuarios_gimnasios.gimnasio_id',$gimnasios_id)->where('usuarios_gimnasios.usuario_id', '<>', Auth::user()->id)->count();
            }else{
                return User::join('usuarios_gimnasios','usuarios_gimnasios.usuario_id','users.id')->where('usuarios_gimnasios.gimnasio_id',$gimnasios_id)->where('usuarios_gimnasios.usuario_id', '<>', Auth::user()->id)->count();
            }
        }
    }


}
