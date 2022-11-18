<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index']);
//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Auth::routes();

Route::middleware(['auth.admin'])->name('admin.')->prefix('/admin')->group(function () {
    //INICIO
    Route::get('', [App\Http\Controllers\Admin\Index\IndexController::class,'index'])->name('index');

    //DISCIPLINAS
    Route::prefix('/disciplinas/')->name('disciplinas.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Disciplina\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Disciplina\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Disciplina\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Disciplina\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Disciplina\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Disciplina\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Disciplina\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Disciplina\DestroyController::class,'destroy'])->name('destroy');
    });

    //ESTILOS
    Route::prefix('/estilos/')->name('estilos.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Estilo\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Estilo\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Estilo\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Estilo\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Estilo\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Estilo\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Estilo\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Estilo\DestroyController::class,'destroy'])->name('destroy');
    });

    //FEDERACIONES
    Route::prefix('/federaciones/')->name('federaciones.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Federacion\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Federacion\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Federacion\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Federacion\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Federacion\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Federacion\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Federacion\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Federacion\DestroyController::class,'destroy'])->name('destroy');
    });

    //REGLAMENTOS
    Route::prefix('/reglamentos/')->name('reglamentos.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Reglamento\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Reglamento\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Reglamento\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Reglamento\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Reglamento\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Reglamento\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Reglamento\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Reglamento\DestroyController::class,'destroy'])->name('destroy');
    });

    //USUARIOS
    Route::prefix('usuarios/')->name('usuarios.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Usuario\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Usuario\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Usuario\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Usuario\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Usuario\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Usuario\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Usuario\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Usuario\DestroyController::class,'destroy'])->name('destroy');
    });

    //CUOTAS
    Route::prefix('cuotas/')->name('cuotas.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Cuota\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Cuota\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Cuota\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Cuota\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Cuota\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Cuota\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Cuota\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Cuota\DestroyController::class,'destroy'])->name('destroy');
    });

    //GIMNASIOS
    Route::prefix('gimnasios/')->name('gimnasios.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Gimnasio\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Gimnasio\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/verUsuariosAjax/{id}', [App\Http\Controllers\Admin\Gimnasio\IndexController::class,'verUsuariosAjax'])->name('verUsuariosAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Gimnasio\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Gimnasio\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Gimnasio\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Gimnasio\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Gimnasio\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Gimnasio\DestroyController::class,'destroy'])->name('destroy');
    });

    //CURSOS
    Route::prefix('cursos/')->name('cursos.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Curso\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Curso\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Curso\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Curso\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Curso\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Curso\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Curso\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Curso\DestroyController::class,'destroy'])->name('destroy');
    });

    //CAMPEONATOS
    Route::prefix('campeonatos/')->name('campeonatos.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Campeonato\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Campeonato\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Campeonato\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Campeonato\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Campeonato\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Campeonato\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Campeonato\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Campeonato\DestroyController::class,'destroy'])->name('destroy');
    });

    //ARBITROS
    Route::prefix('arbitros/')->name('arbitros.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Arbitro\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Arbitro\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Arbitro\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Arbitro\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Arbitro\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Arbitro\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Arbitro\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Arbitro\DestroyController::class,'destroy'])->name('destroy');
    });

    //PRODUCTOS
    Route::prefix('productos/')->name('productos.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Producto\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Producto\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Producto\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Producto\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Producto\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Producto\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Producto\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Producto\DestroyController::class,'destroy'])->name('destroy');
    });

    //CATEGORIAS
    Route::prefix('categorias/')->name('categorias.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Categoria\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Categoria\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Categoria\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Categoria\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Categoria\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Categoria\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Categoria\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Categoria\DestroyController::class,'destroy'])->name('destroy');
    });

    //MARCAS
    Route::prefix('marcas/')->name('marcas.')->group(function(){
        Route::get('', [App\Http\Controllers\Admin\Marca\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Admin\Marca\IndexController::class,'indexAjax'])->name('indexAjax');
        Route::get('/create', [App\Http\Controllers\Admin\Marca\CreateController::class,'create'])->name('create');
        Route::get('/edit/{id}', [App\Http\Controllers\Admin\Marca\EditController::class,'edit'])->name('edit');
        Route::get('/show/{id}', [App\Http\Controllers\Admin\Marca\ShowController::class,'show'])->name('show');
        Route::post('/store', [App\Http\Controllers\Admin\Marca\StoreController::class,'store'])->name('store');
        Route::put('/update/{id}', [App\Http\Controllers\Admin\Marca\UpdateController::class,'update'])->name('update');
        Route::delete('/destroy/{id}', [App\Http\Controllers\Admin\Marca\DestroyController::class,'destroy'])->name('destroy');
    });
});

Route::middleware(['auth.normal'])->name('usuario.')->prefix('/usuario')->group(function () {
    Route::get('', [App\Http\Controllers\Normal\Index\IndexController::class,'index'])->name('index');

    //AAMM
    Route::prefix('/aamm/')->name('aamm.')->group(function(){
        Route::get('', [App\Http\Controllers\Normal\AAMM\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Normal\AAMM\IndexController::class,'indexAjax'])->name('indexAjax');
    });

    //GIMNASIOS
    Route::prefix('/gimnasios/')->name('gimnasios.')->group(function(){
        Route::get('', [App\Http\Controllers\Normal\Gimnasio\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Normal\Gimnasio\IndexController::class,'indexAjax'])->name('indexAjax');
    });

    //CURSOS
    Route::prefix('/cursos/')->name('cursos.')->group(function(){
        Route::get('', [App\Http\Controllers\Normal\Curso\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Normal\Curso\IndexController::class,'indexAjax'])->name('indexAjax');
    });

    //CAMPEONATOS
    Route::prefix('/campeonatos/')->name('campeonatos.')->group(function(){
        Route::get('', [App\Http\Controllers\Normal\Campeonato\IndexController::class,'index'])->name('index');
        Route::get('/indexAjax', [App\Http\Controllers\Normal\Campeonato\IndexController::class,'indexAjax'])->name('indexAjax');
    });

    //PERFIL
    Route::prefix('perfil/')->name('perfil.')->group(function(){
        Route::get('/edit', [App\Http\Controllers\Normal\Perfil\EditController::class,'edit'])->name('edit');
        Route::put('/update/{id}', [App\Http\Controllers\Normal\Perfil\UpdateController::class,'update'])->name('update');
    });
});

//TIENDA
Route::prefix('tienda/')->name('tienda.')->group(function(){
    Route::get('', [App\Http\Controllers\Tienda\IndexController::class,'index'])->name('index');
});

//Route::get('/admin', [App\Http\Controllers\Admin\Index\IndexController::class,'index'])->middleware('auth.admin')->name('admin.index');
//Route::get('/usuario', [App\Http\Controllers\Admin\Index\IndexController::class,'index'])->middleware('auth.normal')->name('normal.index');

