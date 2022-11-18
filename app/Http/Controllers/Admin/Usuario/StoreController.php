<?php

namespace App\Http\Controllers\Admin\Usuario;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Usuario\UsuarioService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    private $usuarioService;

    public function __construct(UsuarioService $usuarioService){
        $this->usuarioService = $usuarioService;
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'apellido1' => 'required',
            'fec_nac' => 'required',
            'sexo' => 'required',
            'email' => 'required|unique:users,email|email',
            'usuario' => 'required|unique:users,usuario',
            'password' => 'required|same:repetir_password',
            'tipo' => 'required'
        ],
        [
            'nombre.required' => __('El nombre del usuario es obligatorio'),
            'apellido1.required' => __('El primer apellido del usuario es obligatorio'),
            'fec_nac.required' => __('La fecha de nacimiento del usuario es obligatoria'),
            'sexo.required' => __('El sexo del usuario es obligatorio'),
            'email.required' => __('El campo email es obligatorio'),
            'email.unique' => __('Este email ya ha sido registrado'),
            'email.email' => __('No es una cuenta de email valida'),
            'usuario.required' => __('El campo usuario es obligatorio'),
            'usuario.unique' => __('Este nombre de usuario ya esta registrado'),
            'password.required' => __('La contraseña es obligatoria'),
            'password.same' => __('Las contraseñas no coinciden'),
            'tipo.required' => __('El rol del usuario es obligatorio'),
        ]);

        $dataRequest = $request->except('_token','repetir_password');

        try{
            DB::connection()->beginTransaction();
            $this->usuarioService->store($dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.usuarios.index')->with('error','El usuario '.$request->nombre.' no se ha podido añadir');
        }

        return redirect()->route('admin.usuarios.index')->with('success','El usuario '.$request->nombre.' se ha añadido con exito');
    }
}
