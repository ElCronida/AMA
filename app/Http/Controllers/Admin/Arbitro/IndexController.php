<?php

namespace App\Http\Controllers\Admin\Arbitro;

use Illuminate\Routing\Controller;
use App\Services\Arbitro\ArbitroService;

class IndexController extends Controller
{
    private $arbitroService;

    public function __construct(ArbitroService $arbitroService){
        $this->arbitroService = $arbitroService;
    }

    public function index(){
        return view('admin.arbitros.index');
    }

    public function indexAjax(){
        $data = $this->arbitroService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
