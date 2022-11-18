<?php

namespace App\Http\Controllers\Admin\Cuota;

use Illuminate\Routing\Controller;
use App\Services\Cuota\CuotaService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $cuotaService;

    public function __construct(CuotaService $cuotaService){
        $this->cuotaService = $cuotaService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->cuotaService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.cuotas.index')->with('error','Ha ocurrido un error, no se ha podido eliminar la cuota');
        }

        return redirect()->route('admin.cuotas.index')->with('success','Cuota eliminada con exito');
    }
}
