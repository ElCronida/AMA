<?php

namespace App\Http\Controllers\Admin\Curso;

use Illuminate\Routing\Controller;
use App\Services\Curso\CursoService;

class EditController extends Controller
{
    private $cursoService;

    public function __construct(CursoService $cursoService){
        $this->cursoService = $cursoService;
    }

    public function edit($id){
        return view('admin.cursos.edit',[
            'gimnasios' => $this->cursoService->gimnasiosSelect(),
            'curso' => $this->cursoService->getById($id)
        ]);
    }
}
