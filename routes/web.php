<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Route::resource('reservas', ReservaController::class);

Route::get('/empleado',function(){
    return view('empleado.index');
});

//acceso a la ruta mediante Clases
Route::get('/empleado/create',[EmpleadoController::class,'create']);

//automatizar todas las rutas para acceder a todas las vistas
Route::resource('reservas',ReservaController::class)->middleware('auth');
Route::resource('empleado',EmpleadoController::class)->middleware('auth');

Auth::routes(['register'=>false, 'reset'=>false]);

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/home',[EmpleadoController::class, 'index'])->name('home');
});
