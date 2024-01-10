<?php

use App\Http\Controllers\ChamadaController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DoacaoController;
use App\Http\Controllers\GrupoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\ImagemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RedeSocialController;
use App\Http\Controllers\TipoatendimentoController;
use App\Http\Controllers\WelcomeController;
use App\Models\Contato;
use App\Models\Doacao;
use Illuminate\Support\Facades\Route;


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    route::resource('tipoatendimento', TipoatendimentoController::class)->except(['show','create']);

    route::resource('horario', HorarioController::class)->except(['show','create']);

    route::resource('chamada', ChamadaController::class)->except(['show','create']);
    route::get('chamada/status/{id}',[ChamadaController::class,'status'])->name('chamada.status');

    route::resource('grupo', GrupoController::class)->except(['show','create']);
    route::get('grupo/status/{id}',[GrupoController::class,'status'])->name('grupo.status');

    route::resource('imagem', ImagemController::class)->except(['show','create']);

    route::resource('contato', ContatoController::class)->except(['show']);
    route::get('contato/editcep',[ContatoController::class,'editcep'])->name('contato.edit.cep');
    route::post('contato/buscacep',[ContatoController::class,'buscacep'])->name('contato.buscacep');

    route::resource('doacao', DoacaoController::class)->except(['show','create']);

    route::resource('redesocial', RedeSocialController::class)->except(['show','create']);
    route::get('redesocial/status/{id}',[RedeSocialController::class,'status'])->name('redesocial.status');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('atendimento')->group(function(){
    route::get('secretaria',[TipoatendimentoController::class,'secretaria'])->name('atendimento.secretaria');
    route::get('padre',[TipoatendimentoController::class,'padre'])->name('atendimento.padre');
    route::get('confissao',[TipoatendimentoController::class,'confissao'])->name('atendimento.confissao');
});

route::get('missas',[TipoatendimentoController::class,'missas'])->name('missas');
route::get('grupos',[TipoatendimentoController::class,'grupos'])->name('grupos');

Route::get('/doacao', function () {
    $contato = Contato::first();
    $doacao = Doacao::first();
    return view('paginas.doacao',compact(['contato','doacao']));})->name('pages.doacao');

Route::get('/padroeiro', function () {return view('paginas.padroeiro');})->name('pages.padroeiro');
Route::get('/contatos', function () {
    $contatos = Contato::all();
    //dd($contatos);
    return view('paginas.contatos',compact(['contatos']));
})->name('pages.contatos');

route::post('contato', [WelcomeController::class,'send'])->name('contato.send');

require __DIR__ . '/auth.php';
