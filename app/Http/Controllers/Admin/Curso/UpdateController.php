<?php

namespace App\Http\Controllers\Admin\Curso;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Curso\CursoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    private $cursoService;

    public function __construct(CursoService $cursoService){
        $this->cursoService = $cursoService;
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|min:3',
            'fecha_ini' => 'required|date',
            'hora_ini' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i',
            'precio' => 'required',
            'gimnasio_id' => 'required'
        ],
        [
            'nombre.required' => __('El nombre del curso es obligatorio'),
            'nombre.min' => __('La longitud minima del nombre es de 3 caracteres'),
            'fecha_ini.required' => __('La fecha de inicio es obligatoria'),
            'fecha_ini.date' => __('La fecha de inicio tiene que ser una fecha'),
            'hora_ini.required' => __('La hora de inicio es obligatoria'),
            'hora_ini.date_format' => __('La hora de inicio tiene que ser una hora'),
            'hora_fin.required' => __('La hora de finalizacion es obligatoria'),
            'hora_fin.date_format' => __('La hora de finalizacion tiene que ser una hora'),
            'precio.required' => __('El precio del curso es obligatorio'),
            'gimnasio_id.required' => __('Necestias seleccionar un gimnasio')
        ]);

        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->cursoService->update($id,$dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.cursos.index')->with('error','El curso '.$request->nombre.' no se ha podido actualizar');
        }

        return redirect()->route('admin.cursos.index')->with('success','El curso '.$request->nombre.' se ha actualizado con exito');
    }
}
