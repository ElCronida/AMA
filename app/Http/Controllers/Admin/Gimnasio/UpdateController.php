<?php

namespace App\Http\Controllers\Admin\Gimnasio;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Gimnasio\GimnasioService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    private $gimnasioService;

    public function __construct(GimnasioService $gimnasioService){
        $this->gimnasioService = $gimnasioService;
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required|min:3',
            'direccion' => 'required',
            'cod_postal' => 'required',
            'email' => 'required|unique:gimnasios,email,'.$id
        ],
        [
            'nombre.required' => __('El nombre del gimnasio es obligatorio'),
            'nombre.min' => __('La longitud minima del nombre es de 3 caracteres'),
            'direccion.required' => __('La direccion del gimnasio es obligatoria'),
            'cod_postal.required' => __('El codigo postal del gimnasio es obligatorio'),
            'email.required' => __('El email del gimnasio es obligatorio. '),
            'email.unique' => __('Ese email ya esta en uso.')
        ]);


        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->gimnasioService->update($id,$dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.gimnasios.index')->with('error','El gimnasio '.$request->nombre.' no se ha podido actualizar');
        }

        return redirect()->route('admin.gimnasios.index')->with('success','El gimnasio '.$request->nombre.' se ha actualizado con exito');
    }
}
