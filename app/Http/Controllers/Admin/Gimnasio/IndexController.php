<?php

namespace App\Http\Controllers\Admin\Gimnasio;

use Illuminate\Routing\Controller;
use App\Services\Gimnasio\GimnasioService;
use App\Services\Usuario\UsuarioService;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    private $gimnasioService;
    private $usuarioService;

    public function __construct(
        GimnasioService $gimnasioService,
        UsuarioService $usuarioService
    ){
        $this->gimnasioService = $gimnasioService;
        $this->usuarioService = $usuarioService;
    }

    public function index(){
        return view('admin.gimnasios.index');
    }

    public function indexAjax(){
        $data = $this->gimnasioService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }

    public function verUsuariosAjax($id){
        return $this->usuarioService->usuarioEnGimnasios($id);
    }
}
