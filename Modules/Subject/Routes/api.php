<?php

use Illuminate\Http\Request;
use Modules\Subject\Http\Controllers\SubjectApiController;

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

Route::middleware('auth:api')->get('/subject', function (Request $request) {
    return $request->user();
});

Route::prefix('subject')->group(function () {
    Route::post('add', [SubjectApiController::class, 'store']);
    Route::post('update', [SubjectApiController::class, 'update']);

});
