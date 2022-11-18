<?php

namespace App\Http\Controllers\Admin\Usuario;

use Illuminate\Routing\Controller;
use App\Services\Usuario\UsuarioService;

class IndexController extends Controller
{
    private $usuarioService;

    public function __construct(UsuarioService $usuarioService){
        $this->usuarioService = $usuarioService;
    }

    public function index(){
        return view('admin.usuarios.index');
    }

    public function indexAjax(){
        $data = $this->usuarioService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
