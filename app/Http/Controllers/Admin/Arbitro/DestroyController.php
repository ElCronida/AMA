<?php

namespace App\Http\Controllers\Admin\Arbitro;

use Illuminate\Routing\Controller;
use App\Services\Arbitro\ArbitroService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $arbitroService;

    public function __construct(ArbitroService $arbitroService){
        $this->arbitroService = $arbitroService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->arbitroService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.arbitros.index')->with('error','Ha ocurrido un error, no se ha podido eliminar al arbitro');
        }

        return redirect()->route('admin.arbitros.index')->with('success','Arbitro eliminado con exito');
    }
}
