<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\BeneficiarioController;
use App\Http\Controllers\Tipo_BeneficiarioController;
use App\Http\Controllers\PDFController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Auth::routes();
Route::get('/cheques/create', [App\Http\Controllers\ChequeController::class, 'create'])->name('cheques.create');
Route::get('/cheques/list', [App\Http\Controllers\ChequeController::class, 'index'])->name('cheques.index');
Route::get('cheques/{id}/edit', [ChequeController::class, 'edit'])->name('cheques.edit');
Route::delete('cheques/{id}', [ChequeController::class, 'destroy'])->name('cheques.destroy');
Route::post('/cheques', [ChequeController::class, 'store'])->name('cheques.store');
Route::put('/cheques/{id}', [ChequeController::class, 'update'])->name('cheques.update');

Auth::routes();

// Rutas para los Beneficiarios
Route::get('/beneficiarios/list', [BeneficiarioController::class, 'index'])->name('beneficiarios.index');
Route::get('/beneficiarios/create', [BeneficiarioController::class, 'create'])->name('beneficiarios.create');
Route::post('/beneficiarios', [BeneficiarioController::class, 'store'])->name('beneficiarios.store');
Route::get('/beneficiarios/{id}/edit', [BeneficiarioController::class, 'edit'])->name('beneficiarios.edit');
Route::put('/beneficiarios/{id}', [BeneficiarioController::class, 'update'])->name('beneficiarios.update');
Route::delete('/beneficiarios/{id}', [BeneficiarioController::class, 'destroy'])->name('beneficiarios.destroy');

// Rutas para los Tipos_Beneficiarios
Route::get('/tipos_beneficiarios/list', [Tipo_BeneficiarioController::class, 'index'])->name('tipos_beneficiarios.index');
Route::get('/tipos_beneficiarios/create', [Tipo_BeneficiarioController::class, 'create'])->name('tipos_beneficiarios.create');
Route::post('/tipos_beneficiarios', [Tipo_BeneficiarioController::class, 'store'])->name('tipos_beneficiarios.store');
Route::get('/tipos_beneficiarios/{id}/edit', [Tipo_BeneficiarioController::class, 'edit'])->name('tipos_beneficiarios.edit');
Route::put('/tipos_beneficiarios/{id}', [Tipo_BeneficiarioController::class, 'update'])->name('tipos_beneficiarios.update');
Route::delete('/tipos_beneficiarios/{id}', [Tipo_BeneficiarioController::class, 'destroy'])->name('tipos_beneficiarios.destroy');

// Rutas PDF
//Route::get('/cheques/{id}/pdf', [ChequeController::class, 'generatePDF'])->name('cheques.pdf');
Route::get('/cheques/{id}/download', [ChequeController::class, 'generatePDF'])->name('cheques.download');
Route::get('/cheques/{id}/pdf', [ChequeController::class, 'generatePDF'])->name('cheques.download');

//Route::get('/cheques/descargarPDF', [ChequeController::class, 'descargarPDF'])->name('cheques.descargarPDF');