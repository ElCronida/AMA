<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NormalAuth{
    public function handle(Request $request, Closure $next){
        if(auth()->check() && auth()->user()->tipo == "Normal"){
            return $next($request);
        }

        return redirect()->to('/');
    }
}
