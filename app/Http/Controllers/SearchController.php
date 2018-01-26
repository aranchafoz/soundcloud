<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Song;
use App\Playlist;

class SearchController extends Controller
{
  public function search(Request $request) {
    $filter = $request->input('search');

    $songs = Song::searchByFilter($filter);
    $playlists = Playlist::searchByFilter($filter);

    // TODO: Put view here!
    return view('search.search', compact('filter', 'songs', 'playlists'));
  }
}
