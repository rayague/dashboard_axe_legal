<?php

use App\Http\Controllers\Api\EventController;
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

Route::middleware('auth:sanctum')->group(function () {
    // Event routes
    Route::prefix('events')->group(function () {
        Route::get('/', [EventController::class, 'index']);
        Route::post('/', [EventController::class, 'store']);
        Route::get('/{event}', [EventController::class, 'show']);
        Route::put('/{event}', [EventController::class, 'update']);
        Route::delete('/{event}', [EventController::class, 'destroy']);

        // Event registration
        Route::post('/{event}/register', [EventController::class, 'register']);
        Route::delete('/{event}/register', [EventController::class, 'cancelRegistration']);

        // Event attendance and participant management
        Route::put('/{event}/attendance', [EventController::class, 'updateAttendance']);
        Route::put('/{event}/participant-status', [EventController::class, 'updateParticipantStatus']);

        // Event materials management
        Route::get('/{event}/materials', [EventController::class, 'getMaterials']);
        Route::delete('/{event}/materials/{index}', [EventController::class, 'removeMaterial']);
        Route::get('/{event}/materials/{index}/download', [EventController::class, 'downloadMaterial']);
    });
});