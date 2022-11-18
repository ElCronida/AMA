<?php

namespace App\Http\Controllers\Admin\Categoria;


use Illuminate\Routing\Controller;
use App\Services\Categoria\CategoriaService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $categoriaService;

    public function __construct(CategoriaService $categoriaService){
        $this->categoriaService = $categoriaService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->categoriaService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.categorias.index')->with('error','Ha ocurrido un error, no se ha podido eliminar la categoria');
        }

        return redirect()->route('admin.categorias.index')->with('success','Categoria eliminada con exito');
    }
}
