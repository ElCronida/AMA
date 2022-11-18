<?php

namespace App\Services\Marca;

use App\Repositories\Marca\MarcaRepository;
use Carbon\Carbon;


class MarcaService{

    private $marcaRepository;

    public function __construct(MarcaRepository $marcaRepository){
        $this->marcaRepository = $marcaRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];


        foreach($this->marcaRepository->index() as $marca){
            $datosDatatables[] = [
                'id' => $marca->id,
                'nombre' => $marca->nombre,
                'url' => $marca->url_web
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->marcaRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->marcaRepository->store($datos);
    }

    public function update($id, $datos){
        $marca = $this->marcaRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->marcaRepository->update($marca, $datos);
    }

    public function destroy($id){
        return $this->marcaRepository->destroy($id);
    }

    public function marcasSelect(){
        return $this->marcaRepository->marcasSelect();
    }
}
