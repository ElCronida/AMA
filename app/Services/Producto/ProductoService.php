<?php

namespace App\Services\Producto;

use App\Repositories\Producto\ProductoRepository;
use Carbon\Carbon;


class ProductoService{

    private $productoRepository;

    public function __construct(ProductoRepository $productoRepository){
        $this->productoRepository = $productoRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];


        foreach($this->productoRepository->index() as $producto){
            $datosDatatables[] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => number_format($producto->precio,'2',',',''),
                'stock' => $producto->stock,
                'marca' => $producto->nombreMarca != null ? $producto->nombreMarca : __('Sin asignar'),
                'categoria' => $producto->nombreCategoria != null ? $producto->nombreCategoria : __('Sin asignar')
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->productoRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->productoRepository->store($datos);
    }

    public function update($id, $datos){
        $marca = $this->productoRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        return $this->productoRepository->update($marca, $datos);
    }

    public function destroy($id){
        return $this->productoRepository->destroy($id);
    }

    public function marcasSelect(){
        return $this->productoRepository->marcasSelect();
    }
}
