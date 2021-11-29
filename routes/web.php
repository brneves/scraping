<?php

use App\Http\Controllers\PainelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProvedorController,
    TipoMarcacaoController
};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('painel')->middleware('auth')->group(function (){
    Route::get('/', [PainelController::class, 'index'])->name('dashboard');

    //PROVEDORES
    Route::resource('/provedores', ProvedorController::class);
    //TIPOS DE MARCAÇÃO
    Route::resource('/tipos-marcacao', TipoMarcacaoController::class);
});
