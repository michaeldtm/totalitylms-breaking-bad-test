<?php

use App\Http\Controllers\Api\BreakingBad\CharacterController;
use App\Http\Controllers\Api\BreakingBad\DeathController;
use App\Http\Controllers\Api\BreakingBad\QuoteController;
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

Route::get('characters', [CharacterController::class, 'index']);
Route::get('character/random', [CharacterController::class, 'random']);
Route::get('characters/{character_id}', [CharacterController::class, 'show']);

Route::get('quotes', [QuoteController::class, 'index']);
Route::get('quote/random', [QuoteController::class, 'random']);
Route::get('quotes/{character_id}', [QuoteController::class, 'show']);

Route::get('deaths', [DeathController::class, 'index']);
Route::get('death', [DeathController::class, 'characterDeath']);
Route::get('random-death', [DeathController::class, 'random']);
Route::get('death-count', [DeathController::class, 'deathCount']);
