<?php

use App\Http\Controllers\API\AuthController as AuthApi;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// Route::get('/user', [UserApi::class, 'index'])->name('user.index');

Route::post('/register', [AuthApi::class, 'register']);

Route::post('/login', [AuthApi::class, 'login']);

Route::post('/logout', [AuthApi::class, 'logout'])
    ->name('api.logout')
    ->middleware('auth:sanctum');