<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function(){
    return "Ola!";
});

Route::get('/ola/{nome}', function($nome){
    echo "Ola! Seja bem Vindo, ". $nome ."!";
});

//? parametro opcional
Route::get('/seunome/{nome?}', function($nome=null){
    if(isset($nome)){
        echo "Ola! Seja bem Vindo, ". $nome ."!";
    }else{
        echo "Sem Parametro";
    }
});

Route::get('/rotacomregras/{nome}/{n}', function($nome, $n){
    for($i=0; $i<$n;$i++){
        echo "$nome"."<br>";
    }
})->where('nome','[A-Za-z]+')->where('n', '[0-9]+');

Route::prefix('/aplicacao', function(){

})->group(function(){
    Route::get('/', function(){
        return view('app');
    })->name('app');

    Route::get('/user', function(){
        return view('user');
    })->name('app.user');


    Route::get('/profile', function(){
        return view('profile');
    })->name('app.profile');


});

Route::redirect('aplicacoes', 'aplicacao', 302);

Route::get('/todososprodutos', function(){
    return redirect()->route('app');
});

///////////////////////////////////


Route::post('/requisicoes', function(Request $request){
    return "Hello";
});
Route::delete('/requisicoes', function(Request $request){
    return "Hello DELETE";
});
Route::put('/requisicoes', function(Request $request){
    return "Hello PUT";
});
Route::patch('/requisicoes', function(Request $request){
    return "Hello PATCH";
});
Route::options('/requisicoes', function(Request $request){
    return "Hello OPTIONS";
});



