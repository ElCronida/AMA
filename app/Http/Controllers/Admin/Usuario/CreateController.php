<?php

namespace App\Http\Controllers\Admin\Usuario;

use Illuminate\Routing\Controller;
use App\Services\Usuario\UsuarioService;
use App\Services\Gimnasio\GimnasioService;

class CreateController extends Controller
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

    public function create(){
        return view('admin.usuarios.create',[
            'tiposUsuario' => $this->usuarioService->tipoUsuario(),
            'sexoUsuario' => $this->usuarioService->sexoUsuario(),
            'litaGimnasios' => $this->gimnasioService->gimnasiosSelect()
        ]);
    }
}
