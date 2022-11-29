<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Resources\BookResources;
use App\Models\Book;
use App\http\Controllers\BookController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/book', function(){
   return BookResources::collection(Book::all());
});

Route::get('/book/{id}', function(){
    return new BookResources(Book::findOrFail($id));
});

Route::post('/book', [BookController::class, 'store']);
Route::put('/book/{id}', [BookController::class, 'update']);
Route::delete('/book/{id}', [BookController::class, 'destroy']);