<?php

namespace App\Http\Controllers\Admin\Marca;

use Illuminate\Routing\Controller;
use App\Services\Marca\MarcaService;

class IndexController extends Controller
{
    private $marcaService;

    public function __construct(MarcaService $marcaService){
        $this->marcaService = $marcaService;
    }

    public function index(){
        return view('admin.tienda.marcas.index');
    }

    public function indexAjax(){
        $data = $this->marcaService->mountDataIndex();
        return datatables()->of($data)->make(true);
    }
}
