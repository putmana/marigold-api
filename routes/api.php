<?php

use App\Http\Resources\AlbumResource;
use App\Http\Resources\AlbumTracksResource;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/playlist', function () {
    return PlaylistResource::collection(Playlist::all());
});

Route::get('/playlist/{id}', function (string $id) {
    return new PlaylistTracksResource(Playlist::find($id));
});

Route::get('/album', function () {
    return AlbumResource::collection(Album::all());
});

Route::get('/album/{id}', function (string $id) {
    return new AlbumTracksResource(Album::find($id));
});