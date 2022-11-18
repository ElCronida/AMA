<?php

namespace App\Http\Controllers\Admin\Reglamento;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Reglamento\ReglamentoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    private $reglamentoService;

    public function __construct(ReglamentoService $reglamentoService){
        $this->reglamentoService = $reglamentoService;
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => 'El nombre del reglamento es obligatorio'
        ]);


        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->reglamentoService->update($id,$dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.reglamentos.index')->with('error','El reglamento '.$request->nombre.' no se ha podido actualizar');
        }

        return redirect()->route('admin.reglamentos.index')->with('success','El reglamento '.$request->nombre.' se ha actualizado con exito');
    }
}
