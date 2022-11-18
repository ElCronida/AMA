<?php

namespace App\Http\Controllers\Admin\Cuota;

use Illuminate\Routing\Controller;
use App\Services\Cuota\CuotaService;

class IndexController extends Controller
{
    private $cuotaService;

    public function __construct(CuotaService $cuotaService){
        $this->cuotaService = $cuotaService;
    }

    public function index(){
        return view('admin.cuotas.index');
    }

    public function indexAjax(){
        $data = $this->cuotaService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
