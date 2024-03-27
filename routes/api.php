<?php

use App\Http\Controllers\Api\V1\BeerController;
use App\Http\Controllers\Api\V1\BreweryController;
use App\Http\Controllers\Api\V1\ColorController;
use App\Http\Controllers\Api\V1\FeedbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::prefix('v1')->group(function () {
        Route::apiResource('/beers', BeerController::class)->only([
            'index', 'show'
        ]);
        Route::apiResource('/breweries', BreweryController::class)->only([
            'index', 'show'
        ]);
        Route::apiResource('/colors', ColorController::class)->only([
            'index'
        ]);
        Route::apiResource('/feedback', FeedbackController::class)->only([
            'store'
        ]);
    });
});
