<?php

namespace App\Http\Controllers\Admin\Producto;

use Illuminate\Routing\Controller;
use App\Services\Producto\ProductoService;

class IndexController extends Controller
{
    private $productoService;

    public function __construct(ProductoService $productoService){
        $this->productoService = $productoService;
    }

    public function index(){
        return view('admin.tienda.productos.index');
    }

    public function indexAjax(){
        $data = $this->productoService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
