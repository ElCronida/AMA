<?php

namespace App\Http\Controllers\Admin\Campeonato;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Campeonato\CampeonatoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    private $campeonatoService;

    public function __construct(CampeonatoService $campeonatoService){
        $this->campeonatoService = $campeonatoService;
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required|min:3',
            'fecha_ini' => 'required|date',
            'hora_ini' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'reglamento_id' => 'required',
            'arbitros' => 'required'
        ],
        [
            'nombre.required' => __('El nombre del campeonato es obligatorio.'),
            'nombre.min' => __('La longitud minima del nombre es de 3 caracteres.'),
            'fecha_ini.required' => __('La fecha de inicio es obligatoria.'),
            'fecha_ini.date' => __('La fecha de inicio tiene que ser una fecha.'),
            'hora_ini.required' => __('La hora de inicio es obligatoria.'),
            'hora_ini.date_format' => __('La hora de inicio tiene que ser una hora.'),
            'hora_fin.required' => __('La hora de finalizacion es obligatoria.'),
            'hora_fin.date_format' => __('La hora de finalizacion tiene que ser una hora.'),
            'reglamento_id.required' => __('El campeonato necesita un reglamento.'),
            'arbitros.required' => __('Selecciona al menos un arbitro para el campeonato')
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->campeonatoService->store($dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            dd($e);

            return redirect()->route('admin.campeonatos.index')->with('error','El campeonato '.$request->nombre.' no se ha podido añadir');
        }

        return redirect()->route('admin.campeonatos.index')->with('success','El campeonato '.$request->nombre.' se ha añadido con exito');
    }
}
