<?php

namespace App\Http\Controllers\Admin\Federacion;

use Illuminate\Routing\Controller;
use App\Services\Federacion\FederacionService;

class CreateController extends Controller
{
    private $federacionService;

    public function __construct(FederacionService $federacionService){
        $this->federacionService = $federacionService;
    }

    public function create(){
        return view('admin.aamm.federaciones.create');
    }
}
