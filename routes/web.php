<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Home
Route::post('/search', 'SearchController@search');
Route::get('/lista-exitos', 'HomeController@getListaExitos')->name('lista-exitos');

// Authenticated users middleware
Route::group(['middleware' => 'auth'], function() {
  // User
  Route::get('user/{id}', 'UserController@getUserProfile');
  Route::put('user/{id}', 'UserController@putEditProfile');
  Route::put('user/{id}/pic_edit', 'UserController@putEditPicProfile');
  Route::put('user/{id}/landscape_pic', 'UserController@putEditLandscapePic');

  // Song
  Route::get('user/{id}/songs', 'SongController@getUserSongs');
  Route::get('user/{id}/songs/subir', 'SongController@getUserSongsUpload');
  Route::post('user/{id}/songs', 'SongController@postUserSong');
  Route::put('user/{userId}/songs/{songId}', 'SongController@updateUserSong');
  Route::put('user/{userId}/songs/{songId}/pic_edit', 'SongController@putEditPicSong');
  Route::delete('user/{userId}/songs/{songId}', 'SongController@deleteUserSong');

  // Playlist
  Route::get('/playlists/{id}', 'PlaylistController@getPlaylist');
  Route::post('user/{userId}/songs/{songId}/playlist', 'PlaylistController@createPlaylistFromModal');
  Route::get('/user/{id}/playlists', 'PlaylistController@getUserPlaylists');
  Route::post('/playlist/{playlistId}/song/{songId}/add', 'PlaylistController@addSongToPlaylist');
  Route::delete('/playlist/{playlistId}/song/{songId}/add', 'PlaylistController@deleteSongFromPlaylist');
  Route::delete('/playlist/{id}', 'PlaylistController@deletePlaylist');
  Route::put('playlist/{id}', 'PlaylistController@editPlaylist');

});
