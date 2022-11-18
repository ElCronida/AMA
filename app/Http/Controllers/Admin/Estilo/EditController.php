<?php

namespace App\Http\Controllers\Admin\Estilo;

use Illuminate\Routing\Controller;
use App\Services\Estilo\EstiloService;
use App\Services\Disciplina\DisciplinaService;

class EditController extends Controller
{
    private $estiloService;
    private $disciplinaService;

    public function __construct(
        EstiloService $estiloService,
        DisciplinaService $disciplinaService
    ){
        $this->estiloService = $estiloService;
        $this->disciplinaService = $disciplinaService;
    }

    public function edit($id){
        return view('admin.aamm.estilos.edit',[
            'estilo' => $this->estiloService->getById($id),
            'disciplinas' => $this->disciplinaService->disciplinasSelect()
        ]);
    }
}
