<?php

namespace App\Providers;

use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Dispatcher $events)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) {
            //Navbar
            if(auth()->user()->tipo == "Administrador") {
                $event->menu->add(
                    [
                        'text' => __('Inicio'),
                        'icon' => 'fas fa-fw fa-home',
                        'url' => '/admin',
                    ],
                    [
                        'text' => __('Perfil'),
                        'icon' => 'fas fa-fw fa-user',
                        'url' => '/admin/usuarios/edit/'.Auth::user()->id,
                    ],
                );
            }

            if(auth()->user()->tipo == "Normal") {
                $event->menu->add(
                    [
                        'text' => __('Inicio'),
                        'icon' => 'fas fa-fw fa-home',
                        'url' => '/usuario',
                    ],
                    [
                        'text' => __('Perfil'),
                        'icon' => 'fas fa-fw fa-user',
                        'url' => '/usuario/perfil/edit',
                    ],
                );
            }

            //Sidebar
            $event->menu->add(
                [
                    'type' => 'sidebar-menu-search',
                    'text' => __('Buscar'),
                ]
            );

            if(auth()->user()->tipo == "Administrador"){
                $event->menu->add(
                    [
                        'text'    => __('Artes Marciales'),
                        'icon'    => 'fas fa-fw fa-child',
                        'submenu' => [
                            [
                                'text' => 'Disciplinas',
                                'url'  => '/admin/disciplinas',
                            ],
                            [
                                'text' => 'Estilos',
                                'url'  => '/admin/estilos',
                            ],
                            [
                                'text' => 'Federaciones',
                                'url'  => '/admin/federaciones',
                            ],
                            [
                                'text' => 'Reglamentos',
                                'url'  => '/admin/reglamentos',
                            ],
                        ],
                    ],
                    [
                        'text'    => __('Usuarios'),
                        'icon'    => 'fas fa-fw fa-users',
                        'url'  => '/admin/usuarios',
                    ],
                    [
                        'text'    => __('Cuotas'),
                        'icon'    => 'fas fa-fw fa-credit-card',
                        'url'  => '/admin/cuotas',
                    ],
                    [
                        'text'    => 'Gimnasios',
                        'icon'    => 'fas fa-fw fa-university',
                        'url'  => '/admin/gimnasios',
                    ],
                    [
                        'text'    => 'Cursos',
                        'icon'    => 'fas fa-fw fa-graduation-cap',
                        'url'  => '/admin/cursos',
                    ],
                    [
                        'text'    => 'Campeonatos',
                        'icon'    => 'fas fa-fw fa-trophy',
                        'url'  => '/admin/campeonatos',
                    ],
                    [
                        'text'    => 'Arbitros',
                        'icon'    => 'fas fa-fw fa-user',
                        'url'  => '/admin/arbitros',
                    ],
                    [
                        'text'    => 'Tienda',
                        'icon'    => 'fas fa-fw fa-shopping-cart',
                        'submenu' => [
                            [
                                'text' => 'Tienda',
                                'url'  => '/tienda',
                            ],
                            [
                                'text' => 'Productos',
                                'url'  => '/admin/productos',
                            ],
                            [
                                'text' => 'Categorias',
                                'url'  => '/admin/categorias',
                            ],
                            [
                                'text' => 'Marcas',
                                'url'  => '/admin/marcas',
                            ],
                        ],
                    ],
                );
            }
            if(auth()->user()->tipo == "Normal"){
                $event->menu->add(
                    [
                        'text'    => __('Artes Marciales'),
                        'icon'    => 'fas fa-fw fa-child',
                        'url'  => '/usuario/aamm',
                    ],
                    [
                        'text'    => 'Gimnasio',
                        'icon'    => 'fas fa-fw fa-university',
                        'url'  => '/usuario/gimnasios',
                    ],
                    [
                        'text'    => 'Cursos',
                        'icon'    => 'fas fa-fw fa-graduation-cap',
                        'url'  => '/usuario/cursos',
                    ],
                    [
                        'text'    => 'Campeonatos',
                        'icon'    => 'fas fa-fw fa-trophy',
                        'url'  => '/usuario/campeonatos',
                    ],
                    [
                        'text'    => __('Cuota'),
                        'icon'    => 'fas fa-fw fa-credit-card',
                        'url'  => '#',
                    ],
                    [
                        'text'    => 'Tienda',
                        'icon'    => 'fas fa-fw fa-shopping-cart',
                        'url'  => '/tienda',
                    ],
                );
            }
        });
    }
}
