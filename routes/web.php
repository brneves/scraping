<?php

use App\Http\Controllers\PainelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProvedorController,
    TipoMarcacaoController,
    ServicoController,
    UserController,
    MarcacaoController
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
    //SERVIÇO
    Route::resource('/servicos', ServicoController::class);

    Route::resource('usuarios', UserController::class);
    Route::get('perfil', [UserController::class, 'perfil'])->name('usuarios.perfil');
    Route::post('perfil/foto', [UserController::class, 'fotoPerfil'])->name('usuarios.foto');

    Route::get('scraper', [MarcacaoController::class, 'scraper'])->name('scraper');

});
