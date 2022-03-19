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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route:: get ( 'index' ,[ DowloadController ::class, 'index' ])-> name ( 'index' );
Route:: get ( 'criar' ,[ DowloadController ::class, 'create' ])-> name ( 'create' );
Route:: post ( 'store' ,[ DowloadController ::class, 'store' ])-> name ( 'store' );
Route:: get ( 'mostrar/{$id}' ,[ DowloadController ::class, 'show' ])-> name ( 'show' );
Route:: get ( 'editar/{$id}' ,[ DowloadController ::class, 'edit' ])-> name ( 'edit' );
Route:: post( 'update/{$id}' ,[ DowloadController ::class, 'update' ])-> name ( 'update' );
Route:: get ( 'deletar/{$id}' ,[ DowloadController ::class, 'destroy' ])-> name ( 'destroy' );
