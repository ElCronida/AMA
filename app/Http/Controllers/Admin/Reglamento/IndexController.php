<?php

namespace App\Http\Controllers\Admin\Reglamento;

use Illuminate\Routing\Controller;
use App\Services\Reglamento\ReglamentoService;

class IndexController extends Controller
{
    private $reglamentoService;

    public function __construct(ReglamentoService $reglamentoService){
        $this->reglamentoService = $reglamentoService;
    }

    public function index(){
        return view('admin.aamm.reglamentos.index');
    }

    public function indexAjax(){
        $data = $this->reglamentoService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
