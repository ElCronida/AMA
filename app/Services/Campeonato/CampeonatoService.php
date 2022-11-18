<?php

namespace App\Services\Campeonato;

use App\Repositories\Campeonato\CampeonatoRepository;
use Carbon\Carbon;


class CampeonatoService{

    private $campeonatoRepository;

    public function __construct(CampeonatoRepository $campeonatoRepository){
        $this->campeonatoRepository = $campeonatoRepository;
    }

    public function mountDataIndex(){
        $datosDatatables = [];

        foreach($this->campeonatoRepository->index() as $campeonato){
            $datosDatatables[] = [
                'id' => $campeonato->id,
                'nombre' => $campeonato->nombre,
                'direccion' => $campeonato->direccion,
                'fecha' => $campeonato->fecha_fin != null ? 'Desde '.Carbon::parse($campeonato->fecha_ini)->format('d M Y').' hasta '.Carbon::parse($campeonato->fecha_fin)->format('d M Y') : 'El '.Carbon::parse($campeonato->fecha_ini)->format('d M Y'),
                'hora' => 'De '.Carbon::parse($campeonato->hora_ini)->format('H:i').' hasta '.Carbon::parse($campeonato->hora_fin)->format('H:i'),
                'reglamento' => $campeonato->reglamentos->nombre,
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->campeonatoRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now()->timezone('Europe/Madrid');

        $campeonato = $this->campeonatoRepository->store($datos);
        if(isset($datos['arbitros'])){
            $campeonato->arbitros()->sync($datos['arbitros']);
        }
    }

    public function update($id, $datos){
        $campeonato = $this->campeonatoRepository->getById($id);

        $datos['updated_at'] = Carbon::now()->timezone('Europe/Madrid');

        $this->campeonatoRepository->update($campeonato, $datos);
        if(isset($datos['arbitros'])) {
            $campeonato->arbitros()->sync($datos['arbitros']);
        }

        return $campeonato;
    }

    public function destroy($id){
        $campeonato = $this->campeonatoRepository->getById($id);
        $campeonato->arbitros()->detach();
        return $this->campeonatoRepository->destroy($id);
    }

    public function gimnasiosSelect(){
        return $this->campeonatoRepository->gimnasiosSelect();
    }

    public function verCampeonatosDisponibles(){
        $datos = [];
        $fecha = "";
        $hora = "";

        foreach($this->campeonatoRepository->verCampeonatosDisponibles() as $campeonato){
            $fecha = $campeonato->fecha_fin != null ? __('Desde ').Carbon::parse($campeonato->fecha_ini)->format('d M Y').__(' hasta ').Carbon::parse($campeonato->fecha_fin)->format('d M Y') : 'El '.Carbon::parse($campeonato->fecha_ini)->format('d M Y');
            $hora = Carbon::parse($campeonato->hora_ini)->format('H:i').' - '.Carbon::parse($campeonato->hora_fin)->format('H:i');
            $datos[] = [
                'nombre' => $campeonato->nombre,
                'direccion' => $campeonato->direccion,
                'fecha' => $fecha.__(' (').$hora.__(')'),
                'reglamento' => $campeonato->reglamentos->nombre
            ];
        }

        return $datos;
    }
}
