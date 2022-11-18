<?php

namespace App\Http\Controllers\Admin\Campeonato;

use Illuminate\Routing\Controller;
use App\Services\Campeonato\CampeonatoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $campeonatoService;

    public function __construct(CampeonatoService $campeonatoService){
        $this->campeonatoService = $campeonatoService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->campeonatoService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.campeonatos.index')->with('error','Ha ocurrido un error, no se ha podido eliminar el campeonato');
        }

        return redirect()->route('admin.campeonatos.index')->with('success','Campeonato eliminado con exito');
    }
}
