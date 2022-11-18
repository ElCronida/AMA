<?php

namespace App\Services\Curso;

use App\Repositories\Curso\CursoRepository;
use App\Services\Gimnasio\GimnasioService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


class CursoService{

    private $cursoRepository;
    private $gimnasioService;

    public function __construct(
        CursoRepository $cursoRepository,
        GimnasioService $gimnasioService
    ){
        $this->cursoRepository = $cursoRepository;
        $this->gimnasioService = $gimnasioService;
    }

    public function mountDataIndex(){
        $datosDatatables = [];


        foreach($this->cursoRepository->index() as $curso){
            $datosDatatables[] = [
                'id' => $curso->id,
                'nombre' => $curso->nombre,
                'fecha' => $curso->fecha_fin != null ? 'Desde '.Carbon::parse($curso->fecha_ini)->format('d M Y').' hasta '.Carbon::parse($curso->fecha_fin)->format('d M Y') : 'El '.Carbon::parse($curso->fecha_ini)->format('d M Y'),
                'hora' => 'De '.Carbon::parse($curso->hora_ini)->format('H:i').' hasta '.Carbon::parse($curso->hora_fin)->format('H:i'),
                'precio' => $curso->precio,
                'gimnasio' => $curso->gimnasio
            ];
        }

        return $datosDatatables;
    }

    public function getById($id){
        return $this->cursoRepository->getById($id);
    }

    public function store($datos){
        $datos['created_at'] = Carbon::now();

        $datos['precio'] =  round($datos['precio'],2);
        $datos['fecha_fin'] = $datos['fecha_fin'] != null ? $datos['fecha_fin'] : $datos['fecha_ini'];

        return $this->cursoRepository->store($datos);
    }

    public function update($id, $datos){
        $curso = $this->cursoRepository->getById($id);

        $datos['updated_at'] = Carbon::now();
        $datos['precio'] =  round($datos['precio'],2);
        $datos['fecha_fin'] = $datos['fecha_fin'] != null ? $datos['fecha_fin'] : $datos['fecha_ini'];

        return $this->cursoRepository->update($curso, $datos);
    }

    public function destroy($id){
        return $this->cursoRepository->destroy($id);
    }

    public function gimnasiosSelect(){
        return $this->gimnasioService->gimnasiosSelect();
    }

    public function verCursosDisponiblesUsuario(){
        $fecha = "";
        $hora = "";
        $datos = [];
        foreach($this->cursoRepository->verCursosDisponiblesUsuario() as $curso){
            $fecha = $curso->fecha_finCurso != null ? __('Desde ').Carbon::parse($curso->fecha_iniCurso)->format('d M Y').__(' hasta ').Carbon::parse($curso->fecha_finCurso)->format('d M Y') : 'El '.Carbon::parse($curso->fecha_iniCurso)->format('d M Y');
            $hora = Carbon::parse($curso->hora_iniCurso)->format('H:i').' - '.Carbon::parse($curso->hora_finCurso)->format('H:i');

            $datos[] = [
                'nombre' => $curso->nombreCurso,
                'precio' => $curso->precioCurso == 0 ? __('Gratuito') : number_format($curso->precioCurso,2,',','').'€',
                'fecha' => $fecha.__(' (').$hora.__(')'),
                'direccion' => $curso->direccionGimnasio,
                'telefono' => $curso->telefonoGimnasio,
                'email' => $curso->emailGimnasio
            ];
        }

        return $datos;
    }
}
