<?php

namespace App\Http\Controllers\Normal\Gimnasio;

use Illuminate\Routing\Controller;
use App\Services\Gimnasio\GimnasioService;

class IndexController extends Controller
{
    private $gimnasioService;

    public function __construct(GimnasioService $gimnasioService){
        $this->gimnasioService = $gimnasioService;
    }

    public function index(){
        return view('normal.gimnasios.index');
    }

    public function indexAjax(){
        $data = $this->gimnasioService->verGimnasiosUsuario();
        return datatables()->of($data)->make(true);
    }
}
