<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;
use App\Playlist;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if(Auth::guest()) {
        return view('welcome');
      } else {
        $songs = Song::all();

        return view('home', ['songs' => $songs]);
      }
    }
}
