<?php

namespace App\Http\Controllers\Admin\Cuota;

use Illuminate\Routing\Controller;
use App\Services\Cuota\CuotaService;

class CreateController extends Controller
{
    private $cuotaService;

    public function __construct(CuotaService $cuotaService){
        $this->cuotaService = $cuotaService;
    }

    public function create(){
        return view('admin.cuotas.create');
    }
}
