<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;

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

Route::get('/', function () {
    print "<!DOCTYPE html>
    <html>
    <head>
        <title>Primeira página</title>
    </head>
    <body>
        <h1>Alfabeto</h1>
        <p>abcdefghijklmnopqrstuvwxyz</p>
    </body>
    </html>";
});

Route::get('/itens', function () {
    print "GET Itens";
    print $_SERVER['REQUEST_METHOD'];
});

//campo que vem da URL não precisa ter o mesmo nome do que o que a função recebe, é apenas mais intuitivo; a função recebe o nome baseado na posição
Route::get('/bem-vindo/{id}/{nome}/{sobrenome?}', function($id, $nome, $sobrenome = "") { //? indica que é opcional -> não se pode ter parametros obrigatórios depois de opcionais
    print "<div> Seja bem vindo, {$nome} </div>";
    print "<h1> {$sobrenome} </h1>";
    print "<div> Você está acessando o registro com id = <h1> $id </h1> </div>";
})->where('id', '[0-9]+'); // + = tem pelo menos 1, ? = 1 ou nenhum, * = nenhum ou vários

Route::get('estados/{sigla}', function($sigla){
    print "O estado é {$sigla}";
})->where('sigla', '[A-Za-z]{2}');

Route::post('/refeicoes', function () {
    print "POST pworeiwer";
});

Route::get('/pessoas', [PessoaController::class, 'index']);
Route::get('/pessoas/{id}', [PessoaController::class, 'show'])->where('id', '[0-9]+');