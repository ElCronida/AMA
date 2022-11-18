<?php

namespace App\Http\Controllers\Admin\Federacion;

use Illuminate\Routing\Controller;
use App\Services\Federacion\FederacionService;

class IndexController extends Controller
{
    private $federacionService;

    public function __construct(FederacionService $federacionService){
        $this->federacionService = $federacionService;
    }

    public function index(){
        return view('admin.aamm.federaciones.index');
    }

    public function indexAjax(){
        $data = $this->federacionService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
