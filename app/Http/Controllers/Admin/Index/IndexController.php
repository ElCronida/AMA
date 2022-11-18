<?php

namespace App\Http\Controllers\Admin\Index;

use Illuminate\Routing\Controller;
use App\Services\Index\IndexService;

class IndexController extends Controller
{
    private $indexService;

    public function __construct(IndexService $indexService){
        $this->indexService = $indexService;
    }

    public function index(){
        return view('admin.index.index',[
            'numDisciplinas' => $this->indexService->numDisciplinas(),
            'numEstilos' => $this->indexService->numEstilos(),
            'numFederaciones' => $this->indexService->numFederaciones(),
            'numReglamentos' => $this->indexService->numReglamentos(),
            'numUsuarios' => $this->indexService->numUsuarios(),
            'registrosPorMeses' => $this->indexService->registrosPorMeses(),
            'numCuotas' => $this->indexService->numCuotas(),
            'numCampeonatos' => $this->indexService->numCampeonatos(),
            'numArbitros' => $this->indexService->numArbitros(),
            'numGimnasios' => $this->indexService->numGimnasios(),
            'numCursos' => $this->indexService->numCursos(),
            'numProductos' => $this->indexService->numProductos(),
            'numMarcas' => $this->indexService->numMarcas(),
            'numCategorias' => $this->indexService->numCategorias(),
        ]);
    }
}
