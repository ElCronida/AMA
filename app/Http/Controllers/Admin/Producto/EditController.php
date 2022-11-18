<?php

namespace App\Http\Controllers\Admin\Producto;

use Illuminate\Routing\Controller;
use App\Services\Producto\ProductoService;
use App\Services\Marca\MarcaService;
use App\Services\Categoria\CategoriaService;

class EditController extends Controller
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

    public function edit($id){
        return view('admin.tienda.productos.edit',[
            'producto' => $this->productoService->getById($id),
            'marcas' => $this->marcaService->marcasSelect(),
            'categorias' => $this->categoriaService->categoriasSelect()
        ]);
    }
}
