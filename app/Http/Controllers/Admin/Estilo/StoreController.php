<?php

namespace App\Http\Controllers\Admin\Estilo;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Estilo\EstiloService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    private $estiloService;

    public function __construct(EstiloService $estiloService){
        $this->estiloService = $estiloService;
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'disciplina_id' => 'required'
        ],
        [
            'nombre.required' => 'El nombre de la disciplina es obligatorio',
            'disciplina_id.required' => 'Tienes que seleccionar la disciplina de este estilo'
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->estiloService->store($dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.estilos.index')->with('error','El estilo '.$request->nombre.' no se ha podido añadir');
        }

        return redirect()->route('admin.estilos.index')->with('success','El estilo '.$request->nombre.' se ha añadido con exito');
    }
}
