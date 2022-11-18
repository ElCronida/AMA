<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(!auth()->check()){
            return view('auth.login');
        }else{
            switch(auth()->user()->tipo){
                case "Administrador":
                    return redirect()->route('admin.index');
                case "Normal":
                    return redirect()->route('usuario.index');
            }
        }
    }
}
