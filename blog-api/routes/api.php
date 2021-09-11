<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('insert',[BlogController::class,'blogInsert']);
Route::get('blog-list',[BlogController::class,'blogList']);
Route::get('blog-detail/{id}',[BlogController::class,'blogDetail']);
Route::delete('delete-blog/{id}',[BlogController::class,'delete']);

Route::post('contactinsert',[ContactFormController::class,'contactInsert']);
Route::get('display',[ContactFormController::class,'display']);
Route::get('view/{id}',[ContactFormController::class,'view']);

Route::post('category_insert',[BlogController::class,'categoryInsert']);
Route::get('category-list',[BlogController::class,'categoryList']);

