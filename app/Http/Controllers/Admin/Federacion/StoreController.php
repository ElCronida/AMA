<?php

namespace App\Http\Controllers\Admin\Federacion;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Federacion\FederacionService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    private $federacionService;

    public function __construct(FederacionService $federacionService){
        $this->federacionService = $federacionService;
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
        ],
        [
            'nombre.required' => 'El nombre de la federacion es obligatorio',
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->federacionService->store($dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.federaciones.index')->with('error','La federacion '.$request->nombre.' no se ha podido añadir');
        }

        return redirect()->route('admin.federaciones.index')->with('success','La federacion '.$request->nombre.' se ha añadido con exito');
    }
}
