<?php

namespace App\Repositories\Producto;

use App\Models\Producto;

class ProductoRepository{
    public function getById($id){
        return Producto::find($id);
    }

    public function index(){
        return Producto::leftJoin('categorias','categorias.id', 'productos.categoria_id')->
            leftJoin('marcas','marcas.id', 'productos.marca_id')->
            select(
                'productos.id as id',
                'productos.nombre as nombre',
                'productos.precio as precio',
                'productos.stock as stock',
                'categorias.nombre as nombreCategoria',
                'marcas.nombre as nombreMarca'
            )->
            get();
    }

    public function store($producto){
        return Producto::insert($producto);
    }

    public function update($producto, $datos){
        return $producto->update($datos);
    }

    public function destroy($id){
        return Producto::destroy($id);
    }

    public function totalRegistros(){
        return Producto::all()->count();
    }
}
