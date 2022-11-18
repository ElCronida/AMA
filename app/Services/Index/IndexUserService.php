<?php

namespace App\Services\Index;

use App\Repositories\Disciplina\DisciplinaRepository;
use App\Repositories\Estilo\EstiloRepository;
use App\Repositories\Federacion\FederacionRepository;
use App\Repositories\Reglamento\ReglamentoRepository;
use App\Repositories\Usuario\UsuarioRepository;
use App\Repositories\Cuota\CuotaRepository;
use App\Repositories\Campeonato\CampeonatoRepository;
use App\Repositories\Arbitro\ArbitroRepository;
use App\Repositories\Gimnasio\GimnasioRepository;
use App\Repositories\Curso\CursoRepository;
use App\Repositories\Producto\ProductoRepository;
use App\Repositories\Marca\MarcaRepository;
use App\Repositories\Categoria\CategoriaRepository;
use Illuminate\Support\Arr;

class IndexUserService{

    private $disciplinaRepository;
    private $estiloRepository;
    private $federacionRepository;
    private $reglamentoRepository;
    private $usuarioRepository;
    private $cuotaRepository;
    private $campeonatoRepository;
    private $arbitroRepository;
    private $gimnasioRepository;
    private $cursoRepository;
    private $productoRepository;
    private $marcaRepository;
    private $categoriaRepository;

    public function __construct(
        DisciplinaRepository $disciplinaRepository,
        EstiloRepository $estiloRepository,
        FederacionRepository $federacionRepository,
        ReglamentoRepository $reglamentoRepository,
        UsuarioRepository $usuarioRepository,
        CuotaRepository $cuotaRepository,
        CampeonatoRepository $campeonatoRepository,
        ArbitroRepository $arbitroRepository,
        GimnasioRepository $gimnasioRepository,
        CursoRepository $cursoRepository,
        ProductoRepository $productoRepository,
        MarcaRepository $marcaRepository,
        CategoriaRepository $categoriaRepository
    ){
        $this->disciplinaRepository = $disciplinaRepository;
        $this->estiloRepository = $estiloRepository;
        $this->federacionRepository = $federacionRepository;
        $this->reglamentoRepository = $reglamentoRepository;
        $this->usuarioRepository = $usuarioRepository;
        $this->cuotaRepository = $cuotaRepository;
        $this->campeonatoRepository = $campeonatoRepository;
        $this->arbitroRepository = $arbitroRepository;
        $this->gimnasioRepository = $gimnasioRepository;
        $this->cursoRepository = $cursoRepository;
        $this->productoRepository = $productoRepository;
        $this->marcaRepository = $marcaRepository;
        $this->categoriaRepository = $categoriaRepository;
    }

   public function numMisDisciplinas(){
        return $this->disciplinaRepository->numMisDisciplinas();
   }

   public function numMisGimnasios(){
       return $this->gimnasioRepository->numMisGimnasios();
   }

    public function numMisCursosDisponibles(){
        return $this->cursoRepository->numMisCursosDisponibles();
    }

    public function verCursosDisponiblesUsuario(){
        return $this->cursoRepository->verCursosDisponiblesUsuario();
    }

    public function numMisComp(){
        return $this->usuarioRepository->numMisComp();
    }

    public function numCampeonatosDisponibles(){
        return $this->campeonatoRepository->numCampeonatosDisponibles();
    }

    public function estadoCuotaUsuario(){
        return $this->cuotaRepository->estadoCuotaUsuario();
    }
}
