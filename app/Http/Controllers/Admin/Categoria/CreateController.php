<?php

namespace App\Http\Controllers\Admin\Categoria;

use Illuminate\Routing\Controller;
use App\Services\Categoria\CategoriaService;

class CreateController extends Controller
{
    private $categoriaService;

    public function __construct(CategoriaService $categoriaService){
        $this->categoriaService = $categoriaService;
    }

    public function create(){
        return view('admin.tienda.categorias.create');
    }
}
