<?php

namespace App\Http\Controllers\Admin\Cuota;

use Illuminate\Routing\Controller;
use App\Services\Cuota\CuotaService;

class EditController extends Controller
{
    private $cuotaoService;

    public function __construct(CuotaService $cuotaoService){
        $this->cuotaoService = $cuotaoService;
    }

    public function edit($id){
        return view('admin.cuotas.edit',[
            'cuota' => $this->cuotaoService->getById($id)
        ]);
    }
}
