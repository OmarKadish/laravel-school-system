<?php

use Illuminate\Http\Request;
use Modules\Teacher\Http\Controllers\TeacherApiController;

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

Route::middleware('auth:api')->get('/teacher', function (Request $request) {
    return $request->user();
});

Route::prefix('teacher')->group(function () {
    Route::post('add', [TeacherApiController::class, 'store']);
    Route::post('update', [TeacherApiController::class, 'update']);
});
