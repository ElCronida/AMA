<?php

namespace App\Http\Controllers\Admin\Categoria;

use Illuminate\Routing\Controller;
use App\Services\Categoria\CategoriaService;

class EditController extends Controller
{
    private $categoriaService;

    public function __construct(CategoriaService $categoriaService){
        $this->categoriaService = $categoriaService;
    }

    public function edit($id){
        return view('admin.tienda.categorias.edit',[
            'categoria' => $this->categoriaService->getById($id)
        ]);
    }
}
