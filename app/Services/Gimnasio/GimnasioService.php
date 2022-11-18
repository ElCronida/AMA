<?php

namespace App\Services\Gimnasio;

use App\Repositories\Gimnasio\GimnasioRepository;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class GimnasioService{

    private $gimnasioRepository;

    public function __construct(GimnasioRepository $gimnasioRepository){
        $this->gimnasioRepository = $gimnasioRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];


        foreach($this->gimnasioRepository->index() as $gimnasio){
            $datosDatatables[] = [
                'id' => $gimnasio->id,
                'nombre' => $gimnasio->nombre,
                'direccion' => $gimnasio->direccion,
                'email' => $gimnasio->email,
                'telefono' => $gimnasio->telefono
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->gimnasioRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        $gimnasio = $this->gimnasioRepository->store($datos);
        if(isset($datos['disciplinas'])){
            $gimnasio->disciplinas()->sync($datos['disciplinas']);
        }
        if(isset($datos['federaciones'])){
            $gimnasio->federaciones()->sync($datos['federaciones']);
        }

        return $gimnasio;
    }

    public function update($id, $datos){
        $gimnasio = $this->gimnasioRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        $this->gimnasioRepository->update($gimnasio, $datos);
        if(isset($datos['disciplinas'])){
            $gimnasio->disciplinas()->sync($datos['disciplinas']);
        }
        if(isset($datos['federaciones'])){
            $gimnasio->federaciones()->sync($datos['federaciones']);
        }

        return $gimnasio;
    }

    public function destroy($id){
        $gimnasio = $this->gimnasioRepository->getById($id);
        $gimnasio->disciplinas()->detach();
        $gimnasio->federaciones()->detach();

        return $this->gimnasioRepository->destroy($id);
    }

    public function gimnasiosSelect(){
        return $this->gimnasioRepository->gimnasiosSelect();
    }

    public function verGimnasiosUsuario(){
        $datos = [];

        foreach($this->gimnasioRepository->verGimnasiosUsuario() as $gimnasio){
            $datos[] = [
                'nombre' => $gimnasio->nombre,
                'direccion' => $gimnasio->direccion,
                'telefono' => $gimnasio->telefono,
                'email' => $gimnasio->email
            ];
        }

        return $datos;
    }
}
