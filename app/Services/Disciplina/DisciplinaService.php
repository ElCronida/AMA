<?php

namespace App\Services\Disciplina;

use App\Repositories\Disciplina\DisciplinaRepository;
use Carbon\Carbon;

class DisciplinaService{

    private $disciplinaRepository;

    public function __construct(DisciplinaRepository $disciplinaRepository){
        $this->disciplinaRepository = $disciplinaRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];

        foreach($this->disciplinaRepository->index() as $disciplina){
            $datosDatatables[] = [
                'id' => $disciplina->id,
                'nombre' => $disciplina->nombre
            ];
        }

        return $datosDatatables;
    }

    public function datosIndexUsuario(){
        $datos = [];

        foreach($this->disciplinaRepository->verDisciplinasUsuario() as $disciplina){
            $datos[] = [
                'id' => $disciplina->id,
                'disciplina' => $disciplina->nombre
            ];
        }

        return $datos;
    }

    public function getById($id){
        return $this->disciplinaRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->disciplinaRepository->store($datos);
    }

    public function update($id, $datos){
        $disciplina = $this->disciplinaRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->disciplinaRepository->update($disciplina, $datos);
    }

    public function destroy($id){
        return $this->disciplinaRepository->destroy($id);
    }

    public function disciplinasSelect(){
        return $this->disciplinaRepository->disciplinasParaLosSelect();
    }
}
