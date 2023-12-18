<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MobilController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('/mobil', [MobilController::class,'index']);
Route::get('/mobil/{id}',[MobilController::class,'show']);
Route::post('/mobil-create',[MobilController::class, 'store']);
Route::put('/mobil/{id}', [MobilController::class,'update']);
Route::delete('/mobil/{id}', [MobilController::class,'destroy']);