<?php

namespace App\Http\Controllers\Admin\Reglamento;

use Illuminate\Routing\Controller;
use App\Services\Reglamento\ReglamentoService;

class CreateController extends Controller
{
    private $reglamentoService;

    public function __construct(ReglamentoService $reglamentoService){
        $this->reglamentoService = $reglamentoService;
    }

    public function create(){
        return view('admin.aamm.reglamentos.create');
    }
}
