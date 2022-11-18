<?php

namespace App\Http\Controllers\Admin\Arbitro;

use Illuminate\Routing\Controller;
use App\Services\Arbitro\ArbitroService;

class CreateController extends Controller
{
    private $arbitroService;

    public function __construct(ArbitroService $arbitroService){
        $this->arbitroService = $arbitroService;
    }

    public function create(){
        return view('admin.arbitros.create',[
            'disciplinas' => $this->arbitroService->disciplinasSelect()
        ]);
    }
}
