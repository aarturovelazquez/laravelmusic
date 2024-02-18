<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListenerController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\PlaylistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas perfil
Route::resource('profile',ListenerController::class);
Route::get('/login', [ListenerController::class,'index'])->name("login");
Route::get('/logout', [ListenerController::class,'logout'])->name("logout");
Route::get('/signup', [ListenerController::class,'create'])->name("signup");
Route::post('/store', [ListenerController::class,'store'])->name("store");
Route::get('/profilepage', [ListenerController::class,'show'])->name("profilepage");
Route::get('/authenticate', [ListenerController::class,'authenticate'])->name("authenticate");
Route::delete('/profile/{id}', [ListenerController::class, 'destroy']);

//Rutas audio
Route::resource("audio",AudioController::class);
Route::get("mostrarSubirAudio",[AudioController::class,"showAudio"]);
Route::post("subirAudio",[AudioController::class,'subirAudio'])->name("subirAudio");
Route::get("compararAudio",[AudioController::class,'compararAudio'])->name("compararAudio");
Route::get("oursongs",[AudioController::class,'catalog']);
Route::post('/addfavorite/{id}',[AudioController::class,'addfavorite'])->name("addfavorite");
Route::get('/likedsongs', [AudioController::class,'getFavoriteSongs'])->name("likedsongs");
Route::delete('/likedsongs/{id}', [AudioController::class,'deletefavorite'])->name('removesong');


//Rutas playlist
Route::resource('playlist',PlaylistController::class);
Route::get('/playlist', [PlaylistController::class,'index'])->name("playlist");
Route::get('showplaylist/{id}', [PlaylistController::class,'getPlaylist'])->name("showplaylist");
Route::post('/addsong/{songid}', [PlaylistController::class,'selectPlaylist'])->name("addsong");
Route::post('/savechanges', [PlaylistController::class,'addtoPlaylist'])->name("savechanges");
Route::delete('/playlists/{id}', [PlaylistController::class,'deleteplaylist'])->name('deleteplaylist');
Route::delete('/playlists/{playlistId}/songs/{songId}', [PlaylistController::class,'deleteSong'])->name('deleteSong');

// Route::post('/playlists/{playlistId}/add-song/{songId}', [PlaylistController::class,'selectPlaylist'])->name('savesong');


