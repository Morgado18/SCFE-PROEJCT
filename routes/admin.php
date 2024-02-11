<?php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    // use App\Http\Controllers\Admin\OperadorController;
    /* use App\Http\Controllers\Admin\TareafaController;*/

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('operadores', function () {
        return view('welcome');
    });

    Route::get('operadores', ['as' => 'admin.operadores', 'uses' => 'Admin\OperadorController@index']);

    /*START CategoriaTituloHabitante*/
    Route::prefix('categoria_titulo_habitante')->group(function () {
        Route::get('index', ['as' => 'admin.categoria_titulo_habitante.index', 'uses' => 'Admin\CategoriaTituloHabitanteController@index']);
        Route::get('create', ['as' => 'admin.categoria_titulo_habitante.create', 'uses' => 'Admin\CategoriaTituloHabitanteController@create']);
        Route::post('store', ['as' => 'admin.categoria_titulo_habitante.store', 'uses' => 'Admin\CategoriaTituloHabitanteController@store']);
        Route::get('show/{id}', ['as' => 'admin.categoria_titulo_habitante.show', 'uses' => 'Admin\CategoriaTituloHabitanteController@show']);
        Route::get('edit/{id}', ['as' => 'admin.categoria_titulo_habitante.edit', 'uses' => 'Admin\CategoriaTituloHabitanteController@edit']);
        Route::post('update/{id}', ['as' => 'admin.categoria_titulo_habitante.update', 'uses' => 'Admin\CategoriaTituloHabitanteController@update']);
        Route::get('destroy/{id}', ['as' => 'admin.categoria_titulo_habitante.destroy', 'uses' => 'Admin\CategoriaTituloHabitanteController@destroy']);
        Route::get('purge/{id}', ['as' => 'admin.categoria_titulo_habitante.purge', 'uses' => 'Admin\CategoriaTituloHabitanteController@purge']);
    });

    /* ROTAS TAREFAS */
    Route::prefix('tarefa')->group(function () {
        Route::get('dash', ['as' => 'admin.tarefa.dash', 'uses' => 'Admin\TarefaController@dash']);/*  */
        Route::get('home', ['as' => 'admin.tarefa.home', 'uses' => 'Admin\TarefaController@home']);/*  */
        Route::get('create', ['as' => 'admin.tarefa.create', 'uses' => 'Admin\TarefaController@create']);
        Route::post('store', ['as' => 'admin.tarefa.store', 'uses' => 'Admin\TarefaController@store']); /*  */
        Route::get('show/{id}', ['as' => 'admin.tarefa.show', 'uses' => 'Admin\TarefaController@show']);
        Route::get('edit/{id}', ['as' => 'admin.tarefa.edit', 'uses' => 'Admin\TarefaController@edit']);
        Route::post('update/{id}', ['as' => 'admin.tarefa.update', 'uses' => 'Admin\TarefaController@update']);/**/
        Route::get('destroy/{id}', ['as' => 'admin.tarefa.destroy', 'uses' =>'Admin\TarefaController@destroy']); /*  */
        Route::get('purge/{id}', ['as' => 'admin.tarefa.purge', 'uses' => 'Admin\TarefaController@purge']); /*  */
    });

    /*END tarefas*/

    Route::fallback(function(){
        return view('404');
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
