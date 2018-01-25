<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Playlist extends Model
{
  public function user() {
    return $this->belongsTo('App\User');
  }

  public function songs() {
    return $this->hasMany('App\SongPlaylist');
  }

  public function getTimeAgo() {
    Carbon::setLocale('es');
    $time_ago = Carbon::parse($this->created_at)->diffForHumans(null, true);
    return $time_ago;
  }

  /**
  * Returns if a song is contained into a playlist
  */
  public function containsSong($song) {

    foreach ($this->songs as $songPlaylist) {
      if ($song->id == $songPlaylist->song->id) return true;
    }

    return false;
  }
}
