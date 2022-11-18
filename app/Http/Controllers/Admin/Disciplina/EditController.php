<?php

namespace App\Http\Controllers\Admin\Disciplina;

use Illuminate\Routing\Controller;
use App\Services\Disciplina\DisciplinaService;
use App\Models\Disciplina;

class EditController extends Controller
{
    private $disciplinaService;

    public function __construct(DisciplinaService $disciplinaService){
        $this->disciplinaService = $disciplinaService;
    }

    public function edit($id){
        return view('admin.aamm.disciplinas.edit',[
            'disciplina' => $this->disciplinaService->getById($id)
        ]);
    }
}
