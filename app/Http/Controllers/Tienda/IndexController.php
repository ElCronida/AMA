<?php

namespace App\Http\Controllers\Tienda;

use Illuminate\Routing\Controller;

class IndexController extends Controller
{

    public function index(){
        return view('tienda.index');
    }
}
