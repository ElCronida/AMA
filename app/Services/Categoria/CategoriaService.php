<?php

namespace App\Services\Categoria;

use App\Repositories\Categoria\CategoriaRepository;
use Carbon\Carbon;


class CategoriaService{

    private $categoriaRepository;

    public function __construct(CategoriaRepository $categoriaRepository){
        $this->categoriaRepository = $categoriaRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];


        foreach($this->categoriaRepository->index() as $categoria){
            $datosDatatables[] = [
                'id' => $categoria->id,
                'nombre' => $categoria->nombre
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->categoriaRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->categoriaRepository->store($datos);
    }

    public function update($id, $datos){
        $categoria = $this->categoriaRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->categoriaRepository->update($categoria, $datos);
    }

    public function destroy($id){
        return $this->categoriaRepository->destroy($id);
    }

    public function categoriasSelect(){
        return $this->categoriaRepository->categoriasSelect();
    }
}
