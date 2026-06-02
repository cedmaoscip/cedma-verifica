<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AssociadoController;
use App\Http\Controllers\Publico\VerificacaoController;

Route::get('/', function () {
    return redirect('/verificar');
});

// ======================
// ROTAS PÚBLICAS
// ======================
Route::get('/verificar', function () {
    return view('publico.verificar');
})->name('verificar');

Route::post('/api/verificar', [VerificacaoController::class, 'verificar']);

// ======================
// AUTENTICAÇÃO
// ======================
require __DIR__.'/auth.php';

// ======================
// PAINEL ADMINISTRATIVO
// ======================
Route::prefix('admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('associados', AssociadoController::class);
    
    Route::post('associados/{associado}/status', [AssociadoController::class, 'updateStatus'])
         ->name('associados.status');
         
    Route::post('associados/{associado}/qr', [AssociadoController::class, 'gerarQr'])
         ->name('associados.qr');
         
    Route::get('associados/{associado}/carteirinha', [App\Http\Controllers\Admin\CarteirinhaController::class, 'gerar'])
         ->name('associados.carteirinha');
});
