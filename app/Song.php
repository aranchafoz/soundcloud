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

    public function getTimeAgo() {
      Carbon::setLocale('es');
      $time_ago = Carbon::parse($this->released_at)->diffForHumans(null, true);
      return $time_ago;
    }
}
