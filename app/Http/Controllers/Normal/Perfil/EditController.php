<?php

namespace App\Http\Controllers\Normal\Perfil;

use Illuminate\Routing\Controller;
use App\Services\Usuario\UsuarioService;
use App\Services\Gimnasio\GimnasioService;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
    private $usuarioService;
    private $gimnasioService;

    public function __construct(
        UsuarioService $usuarioService,
        GimnasioService $gimnasioService
    ){
        $this->usuarioService = $usuarioService;
        $this->gimnasioService = $gimnasioService;
    }

    public function edit(){
        return view('Normal.perfil.edit',[
            'usuario' => $this->usuarioService->getById(Auth::user()->id),
            'sexoUsuario' => $this->usuarioService->sexoUsuario(),
            'litaGimnasios' => $this->gimnasioService->gimnasiosSelect(),
        ]);
    }
}
