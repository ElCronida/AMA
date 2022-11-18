<?php

namespace App\Http\Controllers\Admin\Usuario;

use Illuminate\Routing\Controller;
use App\Services\Usuario\UsuarioService;
use App\Services\Gimnasio\GimnasioService;

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

    public function edit($id){
        return view('admin.usuarios.edit',[
            'usuario' => $this->usuarioService->getById($id),
            'sexoUsuario' => $this->usuarioService->sexoUsuario(),
            'tiposUsuario' => $this->usuarioService->tipoUsuario(),
            'litaGimnasios' => $this->gimnasioService->gimnasiosSelect()
        ]);
    }
}
