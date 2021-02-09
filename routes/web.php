<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobrenos', 'SobreNosController@principal')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@principal')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function() {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/produto', 'ProdutoController@index')->name('app.produto');
});

Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

/*
ROTA DE FALLBACK
Route::fallback(function() {
    echo 'Rota nao existe. <a href="/">Clique aqui!</a>';
});

REDIRECIONAMENTO DE ROTAS
Route::get('/manutencao', function() {
    return redirect()->route('site.index');
})->name('site.manutencao');

Route::redirect('/manutencao', '/');

*PASSANDO PARAMETROS NAS ROTAS
Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        string $nome, 
        int $categoria_id = 1, // 1 - Informacao
    ) {
        echo "Ola: $nome, $categoria_id!";
    }
)->where('categoria_id', '[0-9]+ ')->where('nome', '[A-Za-z]+');*/