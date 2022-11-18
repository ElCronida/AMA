<?php

namespace App\Http\Controllers\Admin\Campeonato;

use Illuminate\Routing\Controller;
use App\Services\Campeonato\CampeonatoService;

class IndexController extends Controller
{
    private $campeonatoService;

    public function __construct(CampeonatoService $campeonatoService){
        $this->campeonatoService = $campeonatoService;
    }

    public function index(){
        return view('admin.campeonatos.index');
    }

    public function indexAjax(){
        $data = $this->campeonatoService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
