<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnqueteController;
use App\Models\Enquete;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route:: get ( 'index' ,[ EnqueteController::class, 'index' ])-> name ( 'index' );
Route:: get ( 'criar' ,[ EnqueteController::class, 'create' ])-> name ( 'create' );
Route:: post ( 'store' ,[ EnqueteController::class, 'store' ])-> name ( 'store' );
Route:: get ( 'mostrar/{id}' ,[ EnqueteController::class, 'show' ])-> name ( 'show' );
Route:: get ( 'editar/{id}' ,[ EnqueteController::class, 'edit' ])-> name ( 'edit' );
Route:: post( 'update/{id}' ,[ EnqueteController::class, 'update' ])-> name ( 'update' );
Route:: get ( 'deletar/{id}' ,[ EnqueteController::class, 'destroy' ])-> name ( 'destroy' );
Route:: post ( 'voto' ,[ EnqueteController::class, 'voto' ])-> name ( 'voto' );
Route:: get( 'getvoto/{id}' ,[ EnqueteController::class, 'getvoto' ])-> name ( 'getvoto' );

