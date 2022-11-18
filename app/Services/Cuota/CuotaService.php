<?php

namespace App\Services\Cuota;

use App\Repositories\Cuota\CuotaRepository;
use Carbon\Carbon;

class CuotaService{

    private $cuotaRepository;

    public function __construct(CuotaRepository $cuotaRepository){
        $this->cuotaRepository = $cuotaRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];


        foreach($this->cuotaRepository->index() as $cuota){
            $datosDatatables[] = [
                'id' => $cuota->id,
                'nombre' => $cuota->nombre,
                'precio' => $cuota->precio,
                'meses' => $cuota->meses_suscripcion
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->cuotaRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        $datos['precio'] =  round($datos['precio'],2);

        return $this->cuotaRepository->store($datos);
    }

    public function update($id, $datos){
        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');
        $usuario = $this->cuotaRepository->getById($id);

        $datos['precio'] =  round($datos['precio'],2);

        return $this->cuotaRepository->update($usuario, $datos);
    }

    public function destroy($id){
        return $this->cuotaRepository->destroy($id);
    }
}
