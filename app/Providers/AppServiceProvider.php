<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Contracts\Events\Dispatcher;
use JeroenNoten\LaravelAdminLte\Events\BuildingMenu;
use \App\Ator;
use \App\Nacionalidade;
use \App\Filme;
use \App\Produto;
use \App\Tipo;
use \App\Pedido;

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
            $event->menu->add('ATORES');
            $event->menu->add([
                'text'        => 'Atores',
                'url'         => 'atores',
                'icon'        => 'fas fa-fw fa-users',
                'label'       => Ator::count(),
                'label_color' => 'warning',
            ]);
            $event->menu->add([
                'text'        => 'Nacionalidades',
                'url'         => 'nacionalidades',
                'icon'        => 'fas fa-fw fa-flag',
                'label'       => Nacionalidade::count(),
                'label_color' => 'success',
            ]);
            $event->menu->add([
                'text'        => 'Filmes',
                'url'         => 'filmes',
                'icon'        => 'fas fa-fw fa-film',
                'label'       => Filme::count(),
                'label_color' => 'danger',
            ]);

            $event->menu->add([
                'text'        => 'Pedidos',
                'url'         => 'pedidos',
                'icon'        => 'fas fa-fw fa-shopping-bag',
                //'label'       => Pedido::count(),
                'label_color' => 'danger',
            ]);
            $event->menu->add([
                'text'        => 'Produtos',
                'url'         => 'produtos',
                'icon'        => 'fas fa-fw fa-seedling',
                //'label'       => Produto::count(),
                'label_color' => 'success',
            ]);

            $event->menu->add([
                'text'        => 'Tipo',
                'url'         => 'tipos',
                'icon'        => 'fas fa-fw fa-seedling',
                //'label'       => Tipo::count(),
                'label_color' => 'warning',
            ]);
        });
    }
}
