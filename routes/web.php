<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

    Route::group(['middleware'=>'auth'], function () {
        Route::group(['prefix'=>'atores', 'where'=>['id'=>'[0-9]+']], function () {
            Route::any ('',             ['as' => 'atores',          'uses' => 'AtoresController@index'  ]);
            Route::get ('create',       ['as' => 'atores.create',   'uses' => 'AtoresController@create' ]);
            Route::post('store',        ['as' => 'atores.store',    'uses' => 'AtoresController@store'  ]);
            Route::get ('destroy',      ['as' => 'atores.destroy',  'uses' => 'AtoresController@destroy']);
            Route::get ('edit',         ['as' => 'atores.edit',     'uses' => 'AtoresController@edit'   ]);
            Route::put ('{id}/update',  ['as' => 'atores.update',   'uses' => 'AtoresController@update' ]);
        });

        Route::group(['prefix'=>'nacionalidades', 'where'=>['id'=>'[0-9]+']], function () {
            Route::any ('',             ['as' => 'nacionalidades',          'uses' => 'NacionalidadesController@index'  ]);
            Route::get ('create',       ['as' => 'nacionalidades.create',   'uses' => 'NacionalidadesController@create' ]);
            Route::post('store',        ['as' => 'nacionalidades.store',    'uses' => 'NacionalidadesController@store'  ]);
            Route::get ('destroy',      ['as' => 'nacionalidades.destroy',  'uses' => 'NacionalidadesController@destroy']);
            Route::get ('edit',         ['as' => 'nacionalidades.edit',     'uses' => 'NacionalidadesController@edit'   ]);
            Route::put ('{id}/update',  ['as' => 'nacionalidades.update',   'uses' => 'NacionalidadesController@update' ]);
        });

        Route::group(['prefix'=>'filmes', 'where'=>['id'=>'[0-9]+']], function () {
            Route::get ('',             ['as' => 'filmes',          'uses' => 'FilmesController@index'  ]);
            Route::get ('create',       ['as' => 'filmes.create',   'uses' => 'FilmesController@create' ]);
            Route::post('store',        ['as' => 'filmes.store',    'uses' => 'FilmesController@store'  ]);
        });

        Route::group(['prefix'=>'pedidos', 'where'=>['idPedido'=>'[0-9]+']], function () {
            Route::any ('',             ['as' => 'pedidos',          'uses' => 'PedidosController@index'  ]);
            Route::get ('create',       ['as' => 'pedidos.create',   'uses' => 'PedidosController@create' ]);
            Route::post('store',        ['as' => 'pedidos.store',    'uses' => 'PedidosController@store'  ]);
            Route::get ('destroy',      ['as' => 'pedidos.destroy',  'uses' => 'PedidosController@destroy']);
            Route::get ('edit',         ['as' => 'pedidos.edit',     'uses' => 'PedidosController@edit'   ]);
            Route::put ('{idPedido}/update',  ['as' => 'pedidos.update',   'uses' => 'PedidosController@update' ]);
        });
        Route::group(['prefix' => 'produtos', 'where' => ['idProduto' => '[0-9]+']], function () {
            Route::get('',              ['as' => 'produtos',            'uses' => 'ProdutosController@index']);
            Route::get('create',        ['as' => 'produtos.create',     'uses' => 'ProdutosController@create']);
            Route::post('store',        ['as' => 'produtos.store',      'uses' => 'ProdutosController@store']);
            Route::get('destroy',       ['as' => 'produtos.destroy',    'uses' => 'ProdutosController@destroy']);
            Route::get('edit',          ['as' => 'produtos.edit',       'uses' => 'ProdutosController@edit']);
            Route::put('{idProduto}/update', ['as' => 'produtos.update',    'uses' => 'ProdutosController@update']);
        });

        Route::group(['prefix'=>'estoques', 'where'=>['idEstoque'=>'[0-9]+']], function () {
            Route::any ('',             ['as' => 'estoques',            'uses' => 'EstoqueController@index'  ]);
            Route::get ('create',       ['as' => 'estoques.create',     'uses' => 'EstoqueController@create' ]);
            Route::post('store',        ['as' => 'estoques.store',      'uses' => 'EstoqueController@store'  ]);
            Route::get ('destroy',      ['as' => 'estoques.destroy',    'uses' => 'EstoqueController@destroy']);
            Route::get ('edit',         ['as' => 'estoques.edit',       'uses' => 'EstoqueController@edit'   ]);
            Route::put ('{idEstoque}/update',  ['as' => 'estoques.update',   'uses' => 'EstoqueController@update' ]);
        });

        Route::group(['prefix'=>'clientes', 'where'=>['idCliente'=>'[0-9]+']], function () {
            Route::any ('',             ['as' => 'clientes',            'uses' => 'ClientesController@index'  ]);
            Route::get ('create',       ['as' => 'clientes.create',     'uses' => 'ClientesController@create' ]);
            Route::post('store',        ['as' => 'clientes.store',      'uses' => 'ClientesController@store'  ]);
            Route::get ('destroy',      ['as' => 'clientes.destroy',    'uses' => 'ClientesController@destroy']);
            Route::get ('edit',         ['as' => 'clientes.edit',       'uses' => 'ClientesController@edit'   ]);
            Route::put ('{idCliente}/update',  ['as' => 'clientes.update',   'uses' => 'ClientesController@update' ]);
        });

    });
Auth::routes();
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');



