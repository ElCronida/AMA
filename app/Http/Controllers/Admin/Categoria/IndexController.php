<?php

namespace App\Http\Controllers\Admin\Categoria;

use Illuminate\Routing\Controller;
use App\Services\Categoria\CategoriaService;

class IndexController extends Controller
{
    private $categoriaService;

    public function __construct(CategoriaService $categoriaService){
        $this->categoriaService = $categoriaService;
    }

    public function index(){
        return view('admin.tienda.categorias.index');
    }

    public function indexAjax(){
        $data = $this->categoriaService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
