<?php

namespace App\Http\Controllers\Admin\Estilo;

use Illuminate\Routing\Controller;
use App\Services\Estilo\EstiloService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $estiloService;

    public function __construct(EstiloService $estiloService){
        $this->estiloService = $estiloService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->estiloService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.estilos.index')->with('error','Ha ocurrido un error, no se ha podido eliminar el estilo');
        }

        return redirect()->route('admin.estilos.index')->with('success','Estilo eliminado con exito');
    }
}
