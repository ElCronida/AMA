<?php

namespace App\Services\Estilo;

use App\Repositories\Estilo\EstiloRepository;
use Carbon\Carbon;

class EstiloService{

    private $estiloRepository;

    public function __construct(EstiloRepository $estiloRepository){
        $this->estiloRepository = $estiloRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];

        foreach($this->estiloRepository->index() as $estilo){
            $datosDatatables[] = [
                'id' => $estilo->estiloId,
                'disciplina' => $estilo->nombreDisciplina,
                'estilo' => $estilo->nombreEstilo
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->estiloRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->estiloRepository->store($datos);
    }

    public function update($id, $datos){
        $disciplina = $this->estiloRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->estiloRepository->update($disciplina, $datos);
    }

    public function destroy($id){
        return $this->estiloRepository->destroy($id);
    }
}
