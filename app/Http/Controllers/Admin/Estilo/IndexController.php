<?php

namespace App\Http\Controllers\Admin\Estilo;

use Illuminate\Routing\Controller;
use App\Services\Estilo\EstiloService;

class IndexController extends Controller
{
    private $estiloService;

    public function __construct(EstiloService $estiloService){
        $this->estiloService = $estiloService;
    }

    public function index(){
        return view('admin.aamm.estilos.index');
    }

    public function indexAjax(){
        $data = $this->estiloService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
