<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\controladorrestaurante;
use App\Http\Controllers\controladorusuario;

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
    return view('index');
});


/*Route::get('/res', function () {
    return view('restaurante');
});
*/

Route::get('res',[controladorrestaurante::class,'res'])->name('res');
Route::get('index',[controladorrestaurante::class,'index'])->name('index');
Route::get('altares',[controladorrestaurante::class,'altares'])->name('altares');
Route::post('guardarres',[controladorrestaurante::class,'guardarres'])->name('guardarres');
Route::get('desacres/{idres}',[controladorrestaurante::class,'desacres'])->name('desacres');

Route::get('usuario',[controladorusuario::class,'usuario'])->name('usuario');
Route::post('validacap',[controladorusuario::class,'validacap'])->name('validacap');


