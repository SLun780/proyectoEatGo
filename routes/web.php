<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\controladorrestaurante;
use App\Http\Controllers\controladorusuario;
use App\Http\Controllers\RepartidorController;
use App\Http\Controllers\clienteController;
use Illuminate\Support\Facades\Log;


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
/*
Route::get('/', function () {

    Log::debug('Log Activado!');
    return view('index');
});
*/

/*Route::get('/res', function () {
    return view('restaurante');
});
*/
//restaurantes-----------------------
Route::get('res',[controladorrestaurante::class,'res'])->name('res');//muestra o consulta
Route::get('altares',[controladorrestaurante::class,'altares'])->name('altares');//alta resta
Route::post('guardarres',[controladorrestaurante::class,'guardarres'])->name('guardarres');//registra restaurantes
Route::get('desacres/{idres}',[controladorrestaurante::class,'desacres'])->name('desacres');//boton activa
Route::get('activares/{idres}',[controladorrestaurante::class,'activares'])->name('activares');//boton desactiva
Route::get('borrares/{idres}',[controladorrestaurante::class,'borrares'])->name('borrares');//eliminar restaurante
Route::post('guardacares',[controladorrestaurante::class,'guardacares'])->name('guardacares');//guardar modificacion
Route::get('modificares/{idres}',[controladorrestaurante::class,'modificares'])->name('modificares');//modificar

//Usuario------------------------
Route::get('politicaspriva',[controladorusuario::class,'politicaspriva'])->name('politicaspriva');
Route::post('guardausua',[controladorusuario::class,'guardausua'])->name('guardausua');
Route::get('altausua',[controladorusuario::class,'altausua'])->name('altausua');
Route::get('login',[controladorusuario::class,'login'])->name('login');
Route::post('validacap',[controladorusuario::class,'validacap'])->name('validacap');

//Repartidor---------------------
Route::get('repar',[RepartidorController::class,'reporterepartidores'])->name('repar');//Reporte_Repartidores

Route::get('altarepar',[RepartidorController::class,'create'])->name('altarepar');//Crea datos
Route::post('guardarepar',[RepartidorController::class,'store'])->name('guardarepar');//Guarda datos

Route::get('descrepar/{idrep}',[RepartidorController::class,'desactivarepartidor'])->name('descrepar');//Desactiva reparitdor
Route::get('actrepar/{idrep}',[RepartidorController::class,'activarepartidor'])->name('actrepar');//Activa repartidor
Route::get('borrepar/{idrep}',[RepartidorController::class,'borrarepartidor'])->name('borrepar');//Borra repartidor

Route::get('modrepar/{idrep}',[RepartidorController::class,'ModificaRepartidor'])->name('modrepar');//Modifica repartidor
Route::post('guardamodrepar',[RepartidorController::class,'guardacambios'])->name('guardamodrepar');//guarda repartidor
//Clientes------------------------
/*
Route::get('/nuevopedido',[pedidosController::class,'nuevopedido'])->name('nuevopedido');
Route::post('/altap',[pedidosController::class,'altap'])->name('altap');
Route::get('/pedidos',[pedidosController::class,'pedidos'])->name('pedidos');
Route::get('/desactivap/{idped}',[pedidosController::class,'desactivap'])->name('desactivap');
Route::get('/borrarp/{idped}',[pedidosController::class,'borrarp'])->name('borrarp');
Route::get('/modificapedido/{idped}',[pedidosController::class,'modificapedido'])->name('modificapedido');
Route::post('/guardap/{idped}',[pedidosController::class,'guardap'])->name('guardap');

Route::get('/form',[formController::class,'form'])->name('form');
Route::post('/guardar',[formController::class,'guardar'])->name('guardar');

Route::get('/registrar',[formController::class,'registrar'])->name('registrar');
Route::post('/registrarg',[formController::class,'registrarg'])->name('registrarg');*/

Route::get('/registracliente',[clienteController::class,'vista'])->name('registracliente');
Route::post('/altacliente',[clienteController::class,'altacliente'])->name('altacliente');
Route::get('/mostrarcliente',[clienteController::class,'mostrarcliente'])->name('mostrarcliente');
Route::get('/desactivac/{idcli}',[clienteController::class,'desactivac'])->name('desactivac');
Route::get('/activac/{idcli}',[clienteController::class,'activac'])->name('activac');
Route::get('/borrarc/{idcli}',[clienteController::class,'borrarc'])->name('borrarc');
Route::get('/modcliente/{idcli}',[clienteController::class,'modcliente'])->name('modcliente');
Route::post('/guardac/{idcli}',[clienteController::class,'guardac'])->name('guardac');


