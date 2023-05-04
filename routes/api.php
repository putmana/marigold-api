<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Resources\AlbumResource;
use App\Http\Resources\AlbumTracksResource;
use App\Http\Resources\ArtistResource;
use App\Http\Resources\PlaylistResource;
use App\Http\Resources\PlaylistTracksResource;
use App\Models\Album;
use App\Models\Playlist;
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

Route::post('/v1/login', [LoginController::class, 'login']);
Route::post('/v1/register', [RegisterController::class, 'store']);

Route::middleware(['auth:sanctum'])->group(function() {
    Route::prefix('v1')->group(function() {

        Route::get('/verify', function(Request $request) {
            return response()->json(['message' => 'VALID']);
        });

        // <---- USER ---->
        Route::get('/user', function(Request $request) {
            return $request->user();
        });

        // <--- ALBUM --->
        Route::get('/album', [AlbumController::class, 'index']);
        Route::get('/album/{album}', [AlbumController::class, 'show']);
        Route::post('/album/{album}', [AlbumController::class, 'update']);

        // <--- PLAYLIST --->
        Route::get('/playlist', [PlaylistController::class, 'index']);
        Route::get('/playlist/{playlist}', [PlaylistController::class, 'show']);

        // <---- ARTIST ---->
        Route::get('/artist', [ArtistController::class, 'index']);

        Route::get('/logout', function (Request $request) {
            $request->user()->currentAccessToken()->delete();
        });
    });
});