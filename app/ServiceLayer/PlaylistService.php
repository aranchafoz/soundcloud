<?php

namespace App\ServiceLayer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Song;
use App\User;
use App\Playlist;
use App\SongPlaylist;

class PlaylistService {

  /**
  * Create a playlist from an existing song
  * @param $playlistValues array with playlist parameters
  * @param $songId song to be added to new playlist
  */
  public static function createPlaylistFromModal($playlistValues, $songId) {
    $rollback = false;
		DB::beginTransaction();

    try {
      // Create playlist
      $playlist = new Playlist;
      $playlist->name = $playlistValues['name'];
      $playlist->user_id = $playlistValues['user_id'];
      $playlist->private = $playlistValues['private'];

      $playlist->save();

      $songPlaylist = new SongPlaylist;
      $songPlaylist->song_id = $songId;
      $songPlaylist->playlist_id = $playlist->id;

      $songPlaylist->save();

    } catch (QueryException $e) {
			$rollback = true;
		} catch (PDOException $e) {
			$rollback = true;
		}

    if ($rollback) {
      DB::rollback();
			return false;

    } else {
      DB::commit();
      return true;
    }
  }
}
