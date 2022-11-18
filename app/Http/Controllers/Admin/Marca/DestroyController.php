<?php

namespace App\Http\Controllers\Admin\Marca;

use Illuminate\Routing\Controller;
use App\Services\Marca\MarcaService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $marcaService;

    public function __construct(MarcaService $marcaService){
        $this->marcaService = $marcaService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->marcaService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.marcas.index')->with('error','Ha ocurrido un error, no se ha podido eliminar la marca');
        }

        return redirect()->route('admin.marcas.index')->with('success','Marca eliminada con exito');
    }
}
