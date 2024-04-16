<?php

use App\Http\Controllers\CrudCrontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CrudCrontroller::class, "index"])->name("crud.index");

//ruta para crear una tarea
Route::post('/crear-tarea', [CrudCrontroller::class, "create"])->name("crud.create"); 

//ruta para editar tarea
Route::post('/editar-tarea', [CrudCrontroller::class, "update"])->name("crud.update"); 

//ruta para eliminar tarea
Route::get('/eliminar-tarea-{id}', [CrudCrontroller::class, "delete"])->name("crud.delete"); 
