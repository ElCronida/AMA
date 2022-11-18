<?php

namespace App\Services\Federacion;

use App\Repositories\Federacion\FederacionRepository;
use Carbon\Carbon;

class FederacionService{

    private $federacionRepository;

    public function __construct(FederacionRepository $federacionRepository){
        $this->federacionRepository = $federacionRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];

        foreach($this->federacionRepository->index() as $federacion){
            $datosDatatables[] = [
                'id' => $federacion->id,
                'nombre' => $federacion->nombre
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->federacionRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->federacionRepository->store($datos);
    }

    public function update($id, $datos){
        $disciplina = $this->federacionRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->federacionRepository->update($disciplina, $datos);
    }

    public function destroy($id){
        return $this->federacionRepository->destroy($id);
    }

    public function federacionesSelect(){
        return $this->federacionRepository->federacionesSelect();
    }
}
