<?php

namespace App\Http\Controllers\Admin\Curso;

use Illuminate\Routing\Controller;
use App\Services\Curso\CursoService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $cursoService;

    public function __construct(CursoService $cursoService){
        $this->cursoService = $cursoService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->cursoService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.cursos.index')->with('error','Ha ocurrido un error, no se ha podido eliminar el curso');
        }

        return redirect()->route('admin.cursos.index')->with('success','Curso eliminado con exito');
    }
}
