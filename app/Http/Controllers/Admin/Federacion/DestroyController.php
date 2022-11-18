<?php

namespace App\Http\Controllers\Admin\Federacion;

use Illuminate\Routing\Controller;
use App\Services\Federacion\FederacionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $federacionService;

    public function __construct(FederacionService $federacionService){
        $this->federacionService = $federacionService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->federacionService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.federaciones.index')->with('error','Ha ocurrido un error, no se ha podido eliminar la federacion');
        }

        return redirect()->route('admin.federaciones.index')->with('success','Federacion eliminada con exito');
    }
}
