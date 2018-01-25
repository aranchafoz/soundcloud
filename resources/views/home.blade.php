@extends('layouts.app')

@section('styles')
    @parent
    <link href="{{ asset('assets/css/views/home.css') }}" rel="stylesheet">
@stop

@section('content')
<div id="home-navigation-container" class="container">
  <!-- Nav tabs -->
  <div id="nav-tabs">
    <ul role="tablist" class="nav nav-tabs">
      <li class="nav-item">
        <a aria-controls="subir" aria-selected="true" class="nav-link">
          Stream
        </a>
      </li>
      <li class="nav-item active">
        <a data-toggle="tab" aria-controls="songs" aria-selected="false" class="nav-link active">
          Listas de éxitos
        </a>
      </li>
      <li class="nav-item">
        <a aria-controls="estadisticas" aria-selected="false" class="nav-link">
          Descubre
        </a>
      </li>
    </ul>
  </div>

  <!-- Content -->
  <div id="home-content">
    <div class="home-content-filters">
      <div class="filters-topFilter">
        <button class="filters-topFilter-button">
          <span>Top 50</span>
        </button>
      </div>
      <div class="filters-spacerFilter"></div>
    </div>
    <h3 class="home-content-description">
      Las pistas más reproducidas en SoundCloud
    </h3>

    <!-- Songs List -->
    <div class="home-content-songsList">
      <table class="top-songs-table">
        <thead>
          <tr class="top-songs-table-header">
            <th class="header-number"><h5>#</h5></th>
            <th></th>
            <th class="header-name"><h5>Pista</h5></th>
            <th></th>
            <th class="header-plays"><h5>Reproducciones</h5></th>
          </tr>
        </thead>
        <tbody>
          @for($i = 0; $i <= (count($songs) - 1); $i++)
            <tr class="top-songs-table-row">
              <td class="top-songs-table-row-number">
                <span>{{$i + 1}}</span>
              </td>
              <td class="top-songs-table-row-photo">
                <img class="song-image" src="{{asset('images/profile-default.png')}}" >
              </td>
              <td class="top-songs-table-row-name">
                <div>
                  <span class="song-username">{{$songs[$i]->user->name}}</span>
                </br>
                  <span>{{$songs[$i]->name}}</span>
                </div>
              </td>
              <td class="top-songs-table-row-actions">
                <button type="button" data-toggle="modal" data-target="#modalPlaylist{{$songs[$i]->id}}">
                  <span class="fa fa-plus"></span>
                  &nbsp;
                  Añadir a una lista
                </button>
                @component('playlist.modal-playlist', ['user_id' => $songs[$i]->user->id, 'song' => $songs[$i], 'playlists' => Auth::user()->playlists])
                @endcomponent
              </td>
              <td class="top-songs-table-row-plays">
                <span>
                  <img src="https://a-v2.sndcdn.com/assets/images/playback/play-91b117d.svg">
                  <!-- TODO: set audio plays -->
                  {{$songs[$i]->plays}}M
                </span>
              </td>
            </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
