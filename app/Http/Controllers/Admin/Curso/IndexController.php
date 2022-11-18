<?php

namespace App\Http\Controllers\Admin\Curso;

use Illuminate\Routing\Controller;
use App\Services\Curso\CursoService;

class IndexController extends Controller
{
    private $cursoService;

    public function __construct(CursoService $cursoService){
        $this->cursoService = $cursoService;
    }

    public function index(){
        return view('admin.cursos.index');
    }

    public function indexAjax(){
        $data = $this->cursoService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
