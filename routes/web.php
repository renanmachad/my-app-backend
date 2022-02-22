<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductsController;
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
*   Rotas para pegar usuários e produtos pelo ID
*   retorna apenas um usuário/produto por vez.
*/

Route::get('/users/{id}', [UserController::class,'show']);
Route::get('/products/{id}', [ProductsController::class, 'show']);

/*
*   Rotas para registrar produtos e usuários;
*/

Route::post('api/users/register',[UserController::class,'register']);
Route::post('api/products/register',[ProductsController::class,'register']);

/*
*   Rotas para atualizar usuário e seus dados;
*/

Route::put('api/users/update/{id}',[UserController::class,'update']);

/*
*   Rota para deletar 
*/
Route::delete('api/users/delete/{id}', [UserController::class,'delete']);