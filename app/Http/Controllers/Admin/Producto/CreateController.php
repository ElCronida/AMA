<?php

namespace App\Http\Controllers\Admin\Producto;

use Illuminate\Routing\Controller;
use App\Services\Producto\ProductoService;
use App\Services\Marca\MarcaService;
use App\Services\Categoria\CategoriaService;

class CreateController extends Controller
{
    private $productoService;
    private $marcaService;
    private $categoriaService;

    public function __construct(
        ProductoService $productoService,
        MarcaService $marcaService,
        CategoriaService $categoriaService
    ){
        $this->productoService = $productoService;
        $this->marcaService = $marcaService;
        $this->categoriaService = $categoriaService;
    }

    public function create(){
        return view('admin.tienda.productos.create',[
            'marcas' => $this->marcaService->marcasSelect(),
            'categorias' => $this->categoriaService->categoriasSelect()
        ]);
    }
}
