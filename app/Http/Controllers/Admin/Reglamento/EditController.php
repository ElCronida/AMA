<?php

namespace App\Http\Controllers\Admin\Reglamento;

use Illuminate\Routing\Controller;
use App\Services\Reglamento\ReglamentoService;

class EditController extends Controller
{
    private $reglamentoService;

    public function __construct(ReglamentoService $reglamentoService){
        $this->reglamentoService = $reglamentoService;
    }

    public function edit($id){
        return view('admin.aamm.reglamentos.edit',[
            'reglamento' => $this->reglamentoService->getById($id),
        ]);
    }
}
