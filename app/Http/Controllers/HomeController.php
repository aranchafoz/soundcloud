<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;

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
        $songs = Song::orderBy('plays', 'desc')->take(50)->get();

        return view('home', ['songs' => $songs]);
      }
    }
}
