<?php

namespace App\Http\Controllers\Normal\AAMM;

use Illuminate\Routing\Controller;
use App\Services\Disciplina\DisciplinaService;

class IndexController extends Controller
{
    private $disciplinaService;

    public function __construct(DisciplinaService $disciplinaService){
        $this->disciplinaService = $disciplinaService;
    }

    public function index(){
        return view('normal.aamm.index');
    }

    public function indexAjax(){
        $data = $this->disciplinaService->datosIndexUsuario();
        return datatables()->of($data)->make(true);
    }
}
