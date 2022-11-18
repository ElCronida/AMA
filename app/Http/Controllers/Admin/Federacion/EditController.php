<?php

namespace App\Http\Controllers\Admin\Federacion;

use Illuminate\Routing\Controller;
use App\Services\Federacion\FederacionService;

class EditController extends Controller
{
    private $federacionService;

    public function __construct(FederacionService $federacionService){
        $this->federacionService = $federacionService;
    }

    public function edit($id){
        return view('admin.aamm.federaciones.edit',[
            'federacion' => $this->federacionService->getById($id),
        ]);
    }
}
