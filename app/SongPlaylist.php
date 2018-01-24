<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SongPlaylist extends Model
{
    protected $timestamp = false;
    protected $table = 'songs_playlist';

    // Relationships
    public function song() {
      return $this->belongsTo('App\Song');
    }

    public function playlist() {
      return $this->belongsTo('App\Playlist');
    }
}
