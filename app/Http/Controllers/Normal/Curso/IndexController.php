<?php

namespace App\Http\Controllers\Normal\Curso;

use Illuminate\Routing\Controller;
use App\Services\Curso\CursoService;

class IndexController extends Controller
{
    private $cursoService;

    public function __construct(CursoService $cursoService){
        $this->cursoService = $cursoService;
    }

    public function index(){
        //dd($this->cursoService->verCursosDisponiblesUsuario());
        return view('normal.cursos.index');
    }

    public function indexAjax(){
        $data = $this->cursoService->verCursosDisponiblesUsuario();
        return datatables()->of($data)->make(true);
    }
}
