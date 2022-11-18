<?php

namespace App\Http\Controllers\Admin\Campeonato;

use Illuminate\Routing\Controller;
use App\Services\Campeonato\CampeonatoService;
use App\Services\Reglamento\ReglamentoService;
use App\Services\Arbitro\ArbitroService;

class CreateController extends Controller
{
    private $campeonatoService;
    private $reglamentoService;
    private $arbitroService;

    public function __construct(
        CampeonatoService $campeonatoService,
        ReglamentoService $reglamentoService,
        ArbitroService $arbitroService
    ){
        $this->campeonatoService = $campeonatoService;
        $this->reglamentoService = $reglamentoService;
        $this->arbitroService = $arbitroService;
    }

    public function create(){
        return view('admin.campeonatos.create',[
            'reglamentos' => $this->reglamentoService->reglamentosSelect(),
            'listaArbitros' => $this->arbitroService->arbitrosSelect()
        ]);
    }
}
