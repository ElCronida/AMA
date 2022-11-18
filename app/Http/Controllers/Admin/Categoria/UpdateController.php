<?php

namespace App\Http\Controllers\Admin\Categoria;


use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Categoria\CategoriaService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    private $categoriaService;

    public function __construct(CategoriaService $categoriaService){
        $this->categoriaService = $categoriaService;
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => __('El nombre de la categoria es obligatorio'),
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->categoriaService->update($id,$dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.categorias.index')->with('error','La categoria '.$request->nombre.' no se ha podido actualizar');
        }

        return redirect()->route('admin.categorias.index')->with('success','La categoria '.$request->nombre.' se ha actualizado con exito');
    }
}
