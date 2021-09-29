<?php

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

Route::get('/channel', [\App\Http\Controllers\ChannelController::class, 'list']);
Route::get('/channel/{channel}/{date}/timezone/{timezone}', [\App\Http\Controllers\ProgrammeController::class, 'list']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
