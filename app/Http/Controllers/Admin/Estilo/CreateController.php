<?php

namespace App\Http\Controllers\Admin\Estilo;

use Illuminate\Routing\Controller;
use App\Services\Estilo\EstiloService;
use App\Services\Disciplina\DisciplinaService;

class CreateController extends Controller
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

    public function create(){
        return view('admin.aamm.estilos.create',[
            'disciplinas' => $this->disciplinaService->disciplinasSelect()
        ]);
    }
}
