<?php

namespace App\Http\Controllers\Admin\Curso;

use Illuminate\Routing\Controller;
use App\Services\Curso\CursoService;

class CreateController extends Controller
{
    private $cursoService;

    public function __construct(CursoService $cursoService){
        $this->cursoService = $cursoService;
    }

    public function create(){
        return view('admin.cursos.create',[
            'gimnasios' => $this->cursoService->gimnasiosSelect()
        ]);
    }
}
