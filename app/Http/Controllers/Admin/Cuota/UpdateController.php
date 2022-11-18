<?php

namespace App\Http\Controllers\Admin\Cuota;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Cuota\CuotaService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    private $cuotaService;

    public function __construct(CuotaService $cuotaService){
        $this->cuotaService = $cuotaService;
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'meses_suscripcion' => 'required|integer'
        ],
        [
            'nombre.required' => __('El nombre de la cuota es obligatorio'),
            'precio.required' => __('El precio de la cuota es obligatorio'),
            'precio.numeric' => __('El precio tiene que ser numerico'),
            'meses_suscripcion.required' => __('Los meses de suscripcion de la cuota es obligatorio.'),
            'meses_suscripcion.integer' => __('La duracion de suscripcion tiene que ser un numero entero.')
        ]);


        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->cuotaService->update($id,$dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.cuotas.index')->with('error','La cuota '.$request->nombre.' no se ha podido actualizar');
        }

        return redirect()->route('admin.cuotas.index')->with('success','La cuota '.$request->nombre.' se ha actualizado con exito');
    }
}
