<?php

namespace App\Http\Controllers\Admin\Usuario;

use Illuminate\Routing\Controller;
use App\Services\Usuario\UsuarioService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private $usuarioService;

    public function __construct(UsuarioService $usuarioService){
        $this->usuarioService = $usuarioService;
    }

    public function destroy($id){
        try{
            DB::connection()->beginTransaction();
            $this->usuarioService->destroy($id);
            DB::connection()->commit();
        }catch(\Exception $e){
            DB::connection()->rollBack();
            Log::error($e);

            return redirect()->route('admin.usuarios.index')->with('error','Ha ocurrido un error, no se ha podido eliminar al usuario');
        }

        return redirect()->route('admin.usuarios.index')->with('success','Usuario eliminado con exito');
    }
}
