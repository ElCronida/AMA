<?php

namespace App\Http\Controllers\Admin\Arbitro;

use Illuminate\Routing\Controller;
use App\Services\Arbitro\ArbitroService;

class EditController extends Controller
{
    private $arbitroService;

    public function __construct(ArbitroService $arbitroService){
        $this->arbitroService = $arbitroService;
    }

    public function edit($id){
        return view('admin.arbitros.edit',[
            'arbitro' => $this->arbitroService->getById($id),
            'disciplinas' => $this->arbitroService->disciplinasSelect()
        ]);
    }
}
