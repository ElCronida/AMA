<?php

namespace App\Http\Controllers\Admin\Gimnasio;

use Illuminate\Routing\Controller;
use App\Services\Gimnasio\GimnasioService;
use App\Services\Federacion\FederacionService;
use App\Services\Disciplina\DisciplinaService;

class CreateController extends Controller
{
    private $gimnasioService;
    private $federacionService;
    private $disciplinaService;

    public function __construct(
        GimnasioService $gimnasioService,
        FederacionService $federacionService,
        DisciplinaService $disciplinaService
    ){
        $this->gimnasioService = $gimnasioService;
        $this->federacionService = $federacionService;
        $this->disciplinaService = $disciplinaService;
    }

    public function create(){
        return view('admin.gimnasios.create',[
            'listaDisciplinas' => $this->disciplinaService->disciplinasSelect(),
            'listaFederaciones' => $this->federacionService->federacionesSelect()
        ]);
    }
}
