<?php

namespace App\Services\Reglamento;

use App\Repositories\Reglamento\ReglamentoRepository;
use Carbon\Carbon;

class ReglamentoService{

    private $reglamentoRepository;

    public function __construct(ReglamentoRepository $reglamentoRepository){
        $this->reglamentoRepository = $reglamentoRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];

        foreach($this->reglamentoRepository->index() as $reglamento){
            $datosDatatables[] = [
                'id' => $reglamento->id,
                'nombre' => $reglamento->nombre
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->reglamentoRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->reglamentoRepository->store($datos);
    }

    public function update($id, $datos){
        $disciplina = $this->reglamentoRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->reglamentoRepository->update($disciplina, $datos);
    }

    public function destroy($id){
        return $this->reglamentoRepository->destroy($id);
    }

    public function reglamentosSelect(){
        return $this->reglamentoRepository->reglamentosSelect();
    }
}
