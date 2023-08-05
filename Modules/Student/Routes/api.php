<?php

use Illuminate\Http\Request;
use Modules\Student\Http\Controllers\StudentApiController;

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

Route::middleware('auth:api')->get('/student', function (Request $request) {
    return $request->user();
});

Route::prefix('student')->group(function () {
    Route::post('add', [StudentApiController::class, 'store']);
    Route::post('update', [StudentApiController::class, 'update']);
    Route::get('delete/{id}', [StudentApiController::class, 'destroy']);
    Route::get('get/{id}', [StudentApiController::class, 'show']);
    Route::get('getAll', [StudentApiController::class, 'getAll']);
    Route::post('assign', [StudentApiController::class, 'assignSubjects']);
});
