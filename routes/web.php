<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\InicioController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\AutoresController;
use App\Models\Usuarios;

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
    return view('modulos.Ingresar');
});

Auth::routes();

Route::get('Inicio',[InicioController::class,'index']);

Route::get('Mis-datos',[UsuariosController::class,'MisDatos']);
Route::put('Mis-datos',[UsuariosController::class,'DatosUpdate']);

Route::get('Usuarios',[UsuariosController::class,'index']);
Route::post('Usuarios',[UsuariosController::class,'store']);
Route::get('Eliminar-Usuario/{id}',[UsuariosController::class,'destroy']);
Route::get('Editar-Usuario/{id}',[UsuariosController::class,'edit']);
Route::put('actualizar-Usuario/{id}',[UsuariosController::class,'update']);

Route::get('Clientes',[ClientesController::class,'index']);
Route::post('Clientes',[ClientesController::class,'store']);
Route::get('Editar-Cliente/{id}',[ClientesController::class,'edit']);
Route::put('ActualizarC/{id}',[ClientesController::class,'update']);
Route::get('Eliminar-cliente/{id}',[ClientesController::class,'destroy']);

Route::get('Generos',[GeneroController::class,'index']);
Route::post('Generos',[GeneroController::class,'store']);
Route::put('Actualizar-Genero/{genero}',[GeneroController::class,'update']);
Route::get('EliminarGenero/{id}',[GeneroController::class,'destroy']);


Route::get('Autores',[AutoresController::class,'index']);
Route::get('Agregar-Autor',[AutoresController::class,'create']);
