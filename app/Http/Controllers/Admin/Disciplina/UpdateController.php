<?php

namespace App\Http\Controllers\Admin\Disciplina;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Services\Disciplina\DisciplinaService;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    private $disciplinaService;

    public function __construct(DisciplinaService $disciplinaService){
        $this->disciplinaService = $disciplinaService;
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required'
        ],
        [
            'nombre.required' => 'El nombre de la disciplina es obligatorio'
        ]);


        $dataRequest = $request->except('_token');

        try{
            DB::connection()->beginTransaction();
            $this->disciplinaService->update($id,$dataRequest);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.disciplinas.index')->with('error','La disciplina '.$request->nombre.' no se ha podido actualizar');
        }

        return redirect()->route('admin.disciplinas.index')->with('success','La disciplina '.$request->nombre.' se ha actualizado con exito');
    }
}
