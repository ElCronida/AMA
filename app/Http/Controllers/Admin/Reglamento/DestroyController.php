<?php

namespace App\Http\Controllers\Admin\Reglamento;

use Illuminate\Routing\Controller;
use App\Services\Reglamento\ReglamentoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $reglamentoService;

    public function __construct(ReglamentoService $reglamentoService){
        $this->reglamentoService = $reglamentoService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->reglamentoService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.reglamentos.index')->with('error','Ha ocurrido un error, no se ha podido eliminar el reglamento');
        }

        return redirect()->route('admin.reglamentos.index')->with('success','Reglamento eliminado con exito');
    }
}
