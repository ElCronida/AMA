<?php

namespace App\Http\Controllers\Admin\Producto;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Producto\ProductoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    private $productoService;

    public function __construct(ProductoService $productoService){
        $this->productoService = $productoService;
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric|gte:0',
            'stock' => 'required|integer|gte:0',
        ],
        [
            'nombre.required' => __('El nombre del producto es obligatorio.'),
            'precio.required' => __('El precio del producto es obligatorio.'),
            'precio.numeric' => __('El precio del producto tiene que ser númerico.'),
            'precio.gte' => __('El precio del producto tiene que ser mayor o igual que 0.'),
            'stock.required' => __('El campo stock es obligatorio.'),
            'stock.integer' => __('El stock del producto tiene que ser un entero.'),
            'stock.gte' => __('El stock del producto tiene que ser mayor o igual que 0'),
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->productoService->store($dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);


            return redirect()->route('admin.productos.index')->with('error','El producto '.$request->nombre.' no se ha podido añadir');
        }

        return redirect()->route('admin.productos.index')->with('success','El producto '.$request->nombre.' se ha añadido con exito');
    }
}
