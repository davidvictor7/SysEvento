<?php

use App\Http\Controllers\RegisterEventController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\RegisterPanelistController;
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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/main', [RegisterUserController::class, 'index']);

######################## Main Routes ########################
Route::any('/home', [RoutesController::class, 'sendView']) -> name('changeView');

######################## Routes from Event ########################
//Tela de Eventos
Route::get('/eventScreen', [RegisterEventController::class, 'indexEvent']) -> name('eventScreen');

//Mostrar Eventos
Route::get('/showEvent', [RegisterEventController::class, 'recoveryDataBase']) -> name('showEvent');

//Registrar Eventos
Route::post('/registerEvent', [RegisterEventController::class, 'registerEvent']) -> name('registerEvent');

//Deletar Evento
Route::post('/delEvent', [RegisterEventController::class, 'delEvent']) -> name('delEvent');

//Mostrar Dados no modal
//rota - Nome na funcao da controller
Route::post("/getDataEvent", [RegisterEventController::class, 'getDataEvent']) -> name('getDataEvent');

//Update dos eventos
Route::post("/setDataEvent", [RegisterEventController::class, 'setDataEvent']) -> name('setDataEvent');

######################## Routes from Panelists ########################
Route::get("/showPanelist", [RegisterPanelistController::class, 'recoveryDataBasePanelist']) -> name('showPanelist');

Route::get("/requestEventAct", [RegisterPanelistController::class, 'requestEventAct']) -> name('requestEventAct');

Route::post("/registerPanelist", [RegisterPanelistController::class, 'registerPanelist']) -> name('registerPanelist');