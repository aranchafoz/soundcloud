<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\User;
use App\Playlist;
use App\ServiceLayer\PlaylistService;
use App\SongPlaylist;
use Illuminate\Support\Facades\Auth;

class PlaylistController extends Controller
{
    /**
    * GET function for display a single playlist
    * @param $id of the playlist
    */
    public function getPlaylist($id) {

      $playlist = Playlist::find($id);
      if (!$playlist) abort(404);

      return view('playlist.playlist-page', compact('playlist'));
    }

    /**
    *
    */
    public function editPlaylist(Request $request, $id) {
      $playlist = Playlist::find($id);
      if (!$playlist) return abort(404);

      // Handle user input
      $request->validate([
        'name' => 'required|max:50'
      ]);

      $playlist->name = $request->input('name');
      $playlist->private = $request->input('private') == true;

      if ($request->file('image') && $playlist->image) {
        // Delete old profile pic
        Storage::delete($playlist->image);
      }

      if ($request->file('image')) {
          $playlist->image = $request->file('image')->store('public');
      }

      if ($playlist->save()) {

      } else {

      }

      return redirect()->back();
    }

    /**
    * POST function for create a playlist with an existing song
    * @param $request http petition with form inputs
    * @param $userId user creator
    */
    public function createPlaylistFromModal(Request $request, $userId, $songId) {
      $user = User::find($userId);
      $song = Song::find($songId);
      if (!$user || !$song) abort(404);

      $request->validate([
        'name' => 'required|max:50'
      ]);

      // Get form values
      $playlistValues = array();
      $playlistValues['name'] = $request->input('name');
      $playlistValues['user_id'] = $user->id;
      $playlistValues['private'] = $request->input('private') == 'true' ? true : false;

      // Create playlist and add song to this new playlist
      if (PlaylistService::createPlaylistFromModal($playlistValues, $song->id)) {
        return redirect()->back();

      } else {
        // Error creating new playlist
        abort(500);
      }
    }

    /**
    * GET method for get all playlists from a user
    * @param $id user id
    */
    public function getUserPlaylists($id) {
      $user = User::find($id);
      if (!$user) abort (404);

      return view('playlist.user-playlists', compact('user'));
    }

    /**
    * POST method for add a song to an existing playlist
    * @param $playlistId id of the playlist
    * @param $songid id of the song
    */
    public function addSongToPlaylist(Request $request, $playlistId, $songId) {
      $songPlaylist = new SongPlaylist;
      $songPlaylist->playlist_id = $playlistId;
      $songPlaylist->song_id = $songId;

      if ($songPlaylist->save()) {
        return redirect()->back();
      }
    }

    public function deleteSongFromPlaylist(Request $request, $playlistId, $songId) {
      $songPlaylist = SongPlaylist::where('playlist_id', $playlistId)->where('song_id', $songId)->first();
      if (!$songPlaylist) abort(404);

      if ($songPlaylist->delete()) {
        return redirect()->back();
      }
    }

    public function deletePlaylist(Request $request, $id) {
      $playlist = Playlist::find($id);
      if (!$playlist) abort(404);

      if ($playlist->delete()) {
        return redirect()->action('PlaylistController@getUserPlaylists', Auth::user()->id);
      }
    }
}
