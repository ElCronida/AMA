<?php

namespace App\Http\Controllers\Admin\Marca;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Marca\MarcaService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    private $marcaService;

    public function __construct(MarcaService $marcaService){
        $this->marcaService = $marcaService;
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
        ],
        [
            'nombre.required' => __('El nombre de la marca es obligatorio')
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->marcaService->update($id,$dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.marcas.index')->with('error','La marca '.$request->nombre.' no se ha podido actualizar');
        }

        return redirect()->route('admin.marcas.index')->with('success','La marca '.$request->nombre.' se ha actualizado con exito');
    }
}
