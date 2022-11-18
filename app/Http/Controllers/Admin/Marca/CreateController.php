<?php

namespace App\Http\Controllers\Admin\Marca;

use Illuminate\Routing\Controller;
use App\Services\Marca\MarcaService;

class CreateController extends Controller
{
    private $marcaService;

    public function __construct(MarcaService $marcaService){
        $this->marcaService = $marcaService;
    }

    public function create(){
        return view('admin.tienda.marcas.create');
    }
}
