<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\User;
use App\Playlist;
use App\ServiceLayer\PlaylistService;

class PlaylistController extends Controller
{
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
}
