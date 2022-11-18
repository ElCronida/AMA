<?php

namespace App\Http\Controllers\Admin\Producto;

use Illuminate\Routing\Controller;
use App\Services\Producto\ProductoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $productoService;

    public function __construct(ProductoService $productoService){
        $this->productoService = $productoService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->productoService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.productos.index')->with('error','Ha ocurrido un error, no se ha podido eliminar el producto');
        }

        return redirect()->route('admin.productos.index')->with('success','Producto eliminado con exito');
    }
}
