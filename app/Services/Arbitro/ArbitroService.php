<?php

namespace App\Services\Arbitro;

use App\Repositories\Arbitro\ArbitroRepository;
use App\Repositories\Disciplina\DisciplinaRepository;
use Carbon\Carbon;

class ArbitroService{

    private $arbitroRepository;
    private $disciplinaRepository;

    public function __construct(
        ArbitroRepository $arbitroRepository,
        DisciplinaRepository $disciplinaRepository
    ){
        $this->arbitroRepository = $arbitroRepository;
        $this->disciplinaRepository = $disciplinaRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];


        foreach($this->arbitroRepository->index() as $arbitro){
            $datosDatatables[] = [
                'id' => $arbitro->id,
                'nombre' => $arbitro->apellido2 != null ? $arbitro->nombre.' '.$arbitro->apellido1.' '.$arbitro->apellido2 : $arbitro->nombre.' '.$arbitro->apellido1,
                'edad' => Carbon::parse($arbitro->fec_nac)->age.' años ('.Carbon::parse($arbitro->fec_nac)->format('d M Y').')',
                'nacionalidad' => $arbitro->nacionalidad
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->arbitroRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        $arbitro = $this->arbitroRepository->store($datos);

        if (isset($datos['disciplina'])) {
            $arbitro->disciplinas()->sync($datos['disciplina']);
        }

        return $arbitro;
    }

    public function update($id, $datos){
        $arbitro = $this->arbitroRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        $this->arbitroRepository->update($arbitro, $datos);
        if (isset($datos['disciplina'])) {
            $arbitro->disciplinas()->sync($datos['disciplina']);
        }

        return $arbitro;
    }

    public function destroy($id){
        $arbitro = $this->arbitroRepository->getById($id);

        $arbitro->disciplinas()->detach();
        $resultado = $this->arbitroRepository->destroy($id);

        return $resultado;
    }

    public function disciplinasSelect(){
        return $this->disciplinaRepository->disciplinasParaLosSelect();
    }

    public function arbitrosSelect(){
        return $this->arbitroRepository->arbitrosSelect();
    }
}
