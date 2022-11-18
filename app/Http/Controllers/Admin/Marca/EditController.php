<?php

namespace App\Http\Controllers\Admin\Marca;

use Illuminate\Routing\Controller;
use App\Services\Marca\MarcaService;

class EditController extends Controller
{
    private $marcaService;

    public function __construct(MarcaService $marcaService){
        $this->marcaService = $marcaService;
    }

    public function edit($id){
        return view('admin.tienda.marcas.edit',[
            'marca' => $this->marcaService->getById($id)
        ]);
    }
}
