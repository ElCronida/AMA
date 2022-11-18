<?php

namespace App\Http\Controllers\Normal\Index;

use Carbon\Carbon;
use Illuminate\Routing\Controller;
use App\Services\Index\IndexUserService;

class IndexController extends Controller
{
    private $indexUserService;

    public function __construct(IndexUserService $indexUserService){
        $this->indexUserService = $indexUserService;
    }

    public function index(){
        //Carbon::now()->format('Y-m-d')
        //dd($this->indexUserService->numMisDisciplinas());
        return view('normal.index.index',[
            'numMisDisciplinas' => $this->indexUserService->numMisDisciplinas(),
            'numMisGimnasios' => $this->indexUserService->numMisGimnasios(),
            'numMisCursosDisponibles' => $this->indexUserService->numMisCursosDisponibles(),
            'numMisComp' => $this->indexUserService->numMisComp(),
            'numCampeonatosDisponibles' => $this->indexUserService->numCampeonatosDisponibles(),
            'estadoCuotaUsuario' => $this->indexUserService->estadoCuotaUsuario() > 0 ? 'Suscrito' : 'No suscrito'
        ]);
    }
}
