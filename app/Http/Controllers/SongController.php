<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Song;

use Illuminate\Support\Facades\Auth;
use App\User;

class SongController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {
    // get all the songs
    $songs = Song::all();

    // load the view and pass the songs
    return view('songs.index', ['songs' => $songs]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      // load the create form (app/views/songs/create.blade.php)
      return view('songs.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request) {
    // store
    $song = new Song;
    $song->name         = $request->input('name');
    $song->description  = $request->input('description');
    $song->image        = $request->input('image');
    $song->audio        = $request->input('audio');

    // FIXME: set Date.now() value
    $song->released_at  = null;
    // default values on create song
    $song->plays       = 0;

    // associate with user
    $id = Auth::user()->id;
    $song->user()->associate($id);

    // save song
    $song->save();
    return redirect()->action('SongController@index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id) {
      $song = Song::findOrFail($id);
      $user = User::where('id', '=', $song->user_id)->get();
      return view('songs.show', ['song' => $song, 'user' => $user]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id) {
      // get the song
      $song = Song::findOrFail( $id );
      // show the edit form and pass the song
      return view('songs.edit', ['song' => $song]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
      // store
      $song = Song::findOrFail($id);
      $song->name         = $request->input('name');
      $song->description  = $request->input('description');
      $song->image        = $request->input('image');
      $song->audio        = $request->input('audio');

      // FIXME: set Date.now() value
      $song->released_at  = null;
      // default values on create song
      $song->plays       = 0;

      // associate with user
      $id = Auth::user()->id;
      $song->user()->associate($id);

      // save song
      $song->save();
      return redirect()->action('SongController@index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $song = Song::find($id);
      $song->delete();
      return redirect()->action('SongController@index');
  }
}
