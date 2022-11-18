<?php

namespace App\Http\Controllers\Admin\Gimnasio;

use Illuminate\Routing\Controller;
use App\Services\Gimnasio\GimnasioService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $gimnasioService;

    public function __construct(GimnasioService $gimnasioService){
        $this->gimnasioService = $gimnasioService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->gimnasioService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.gimnasios.index')->with('error','Ha ocurrido un error, no se ha podido eliminar el gimnasio');
        }

        return redirect()->route('admin.gimnasios.index')->with('success','Gimnasio eliminado con exito');
    }
}
