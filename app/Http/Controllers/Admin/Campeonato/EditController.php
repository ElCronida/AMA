<?php

namespace App\Http\Controllers\Admin\Campeonato;

use Illuminate\Routing\Controller;
use App\Services\Campeonato\CampeonatoService;
use App\Services\Reglamento\ReglamentoService;
use App\Services\Arbitro\ArbitroService;

class EditController extends Controller
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

    public function edit($id){
        return view('admin.campeonatos.edit',[
            'campeonato' => $this->campeonatoService->getById($id),
            'reglamentos' => $this->reglamentoService->reglamentosSelect(),
            'listaArbitros' => $this->arbitroService->arbitrosSelect()
        ]);
    }
}
