@extends('menus.creator-navigation')

@section('styles')
    @parent
    <link href="{{ asset('assets/css/views/songs/index.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/songs/song-extended-view.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/songs/modal-delete-song.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/components/modal-nav-tabs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/songs/song-form.css') }}" rel="stylesheet">
@stop

@section('creator-content')
<div>
  <div class="header-ur-songs">
    <h1 id="title">Tus pistas</h1>
    <div class="header-ur-songs-tools">
      <div class="header-ur-songs-tools-selectAll">
        <input type="checkbox" />
      </div>
      <div class="header-ur-songs-tools-actions">
        <div class="tools-button-group">
          <button type="button" class="btn btn-editar">
            <span class="fa fa-pencil" aria-hidden="true"></span>
            Editar pistas
            <span class="fa fa-angle-down" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-addToPlaylist" data-toggle="modal" data-target="#modalPlaylist">
            <span class="fa fa-plus" aria-hidden="true"></span>
            Añadir a una lista
          </button>
        </div>
      </div>
      <div class="header-ur-songs-tools-pagination">
        <div class="header-ur-songs-tools-pagination-numbers">
          <span>
            1 - {{ count($songs) }} de {{ count($songs) }} pistas
          </span>
        </div>
        <div class="header-ur-songs-tools-pagination-buttons">
          <div class="btn-group pagination-button-group">
            <button class="btn">
              <span class="fa fa-caret-left" aria-hidden="true"></span>
            </button>
            <button class="btn">
              <span class="fa fa-caret-right" aria-hidden="true"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="hazte-pro">
    <div class="hazte-pro-info">
      <div>
        Te quedan 180 minutos.
        <br>
        <span>
          Obtén más minutos para subir más material.
        </span>
      </div>
    </div>
    <div class="hazte-pro-button">
      <button>
        Prueba Pro
      </button>
    </div>
  </div>

  <!-- Songs list -->
  <div class="main-ur-songs">
    <table class="ur-songs-table">
      <tbody>
        @foreach($songs as $song)
          <tr class="ur-songs-table-row">
            <td class="ur-songs-table-row-checkbox">
              <input type="checkbox">
            </td>
            <td class="ur-songs-table-row-photo">
              <img class="song-image" @if($song->image) src="{{\Storage::url($song->image)}}"
              @else src="{{URL::asset('images/profile-default.png')}}" @endif>
            </td>
            <td class="ur-songs-table-row-name">
              <div>
                <span class="song-username">{{$user->name}}</span>
              </br>
                <span>{{$song->name}}</span>
              </div>
            </td>
            <td class="ur-songs-table-row-actions">
              <button type="button" data-toggle="modal" data-target="#modalPlaylist{{$song->id}}">
                <span class="fa fa-plus"></span>
              </button>
              @component('playlist.modal-playlist', ['user_id' => Auth::user()->id, 'song' => $song, 'playlists' => Auth::user()->playlists])
              @endcomponent
              <button type="button" data-toggle="modal" data-target="#modalEditSong{{$song->id}}">
                <span class="fa fa-pencil"></span>
              </button>
              @component('songs.modal-edit-song', ['user' => Auth::user(), 'song' => $song])
              @endcomponent
              <button type="button" data-toggle="modal" data-target="#modalDeleteSong{{$song->id}}">
                <span class="fa fa-trash"></span>
              </button>
              @component('songs.modal-delete-song', ['user' => Auth::user(), 'song' => $song])
              @endcomponent
            </td>
            <td class="ur-songs-table-row-private">
              @if($song->private)
                <span class="fa fa-lock"></span>
              @endif
            </td>
            <td class="ur-songs-table-row-duration">
              <span>
                <!-- TODO: set audio duration -->
                0:04
              </span>
            </td>
            <td class="ur-songs-table-row-timestamp">
              <span>
                {{ $song->getTimeAgo() }}
              </span>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@stop
