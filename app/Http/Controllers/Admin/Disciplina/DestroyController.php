<?php

namespace App\Http\Controllers\Admin\Disciplina;

use Illuminate\Routing\Controller;
use App\Services\Disciplina\DisciplinaService;
use App\Models\Disciplina;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $disciplinaService;

    public function __construct(DisciplinaService $disciplinaService){
        $this->disciplinaService = $disciplinaService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->disciplinaService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.disciplinas.index')->with('error','Ha ocurrido un error, no se ha podido eliminar la disciplina');
        }

        return redirect()->route('admin.disciplinas.index')->with('success','Disciplina eliminada con exito');
    }
}
