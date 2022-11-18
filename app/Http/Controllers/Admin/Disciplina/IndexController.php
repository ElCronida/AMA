<?php

namespace App\Http\Controllers\Admin\Disciplina;

use Illuminate\Routing\Controller;
use App\Services\Disciplina\DisciplinaService;
use App\Models\Disciplina;

class IndexController extends Controller
{
    private $disciplinaService;

    public function __construct(DisciplinaService $disciplinaService){
        $this->disciplinaService = $disciplinaService;
    }

    public function index(){
        return view('admin.aamm.disciplinas.index');
    }

    public function indexAjax(){
        $data = $this->disciplinaService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
