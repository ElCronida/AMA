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

class IndexService{

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

    public function numDisciplinas(){
        return $this->disciplinaRepository->numDisciplinas();
    }

    public function numEstilos(){
        return $this->estiloRepository->numEstilos();
    }

    public function numFederaciones(){
        return $this->federacionRepository->totalRegistros();
    }

    public function numReglamentos(){
        return $this->reglamentoRepository->totalRegistros();
    }

    public function numUsuarios(){
        return $this->usuarioRepository->totalRegistros();
    }

    public function registrosPorMeses(){
        $registros =  $this->usuarioRepository->registroPorMeses();

        $montarRegistros = [];
        for($i = 1; $i <= 12; $i++){
            $montarRegistros[] = 0;
            for($x = 0; $x < count($registros); $x++){
                if($registros[$x]['mes'] == $i && $montarRegistros[$i-1] == 0){
                    $montarRegistros[$i-1] = [$registros[$x]['total']];
                }
            }
        }

        return json_encode(Arr::flatten($montarRegistros));
    }

    public function numCuotas(){
        return $this->cuotaRepository->totalRegistros();
    }

    public function numCampeonatos(){
        return $this->campeonatoRepository->totalRegistros();
    }

    public function numArbitros(){
        return $this->arbitroRepository->totalRegistros();
    }

    public function numGimnasios(){
        return $this->gimnasioRepository->totalRegistros();
    }

    public function numCursos(){
        return $this->cursoRepository->totalRegistros();
    }

    public function numProductos(){
        return $this->productoRepository->totalRegistros();
    }

    public function numMarcas(){
        return $this->marcaRepository->totalRegistros();
    }

    public function numCategorias(){
        return $this->categoriaRepository->totalRegistros();
    }
}
