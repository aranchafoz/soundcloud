<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Song extends Model
{
    //
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function playlists() {
      return $this->hasMany('App\SongPlaylist');
    }

    public function getTimeAgo() {
      Carbon::setLocale('es');
      $time_ago = Carbon::parse($this->released_at)->diffForHumans(null, true);
      return $time_ago;
    }

    public static function searchByFilter($filter) {
      $songs = Song::where('songs.name', 'LIKE', "%{$filter}%")->orWhere('songs.description', 'LIKE', "%{$filter}%")
                ->orWhere('users.name', 'LIKE', "%{$filter}%")
                ->leftJoin('users', 'songs.user_id', '=', 'users.id')
                ->get();

      return $songs;
    }
}
