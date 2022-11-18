<?php

namespace App\Http\Controllers\Admin\Federacion;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Federacion\FederacionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    private $federacionService;

    public function __construct(FederacionService $federacionService){
        $this->federacionService = $federacionService;
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => 'El nombre de la federacion es obligatorio'
        ]);


        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->federacionService->update($id,$dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.federaciones.index')->with('error','La federacion '.$request->nombre.' no se ha podido actualizar');
        }

        return redirect()->route('admin.federaciones.index')->with('success','la federacion '.$request->nombre.' se ha actualizado con exito');
    }
}
