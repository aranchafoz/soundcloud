@extends('layouts.app')

@section('styles')
    @parent
    <link href="{{ asset('assets/css/views/search.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/songs/song-extended-view.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/playlists/component-playlist.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="search-main-container">

  <div class="search-fixed-top-container">
    <h1>
      Resultados de búsqueda para “{{$filter}}”
    </h1>
  </div>

  <div class="search-fixed-left-container">
    <div class="search-fixed-left-scrolleable">
      <div class="searchOptions">
        <ul role="tablist">
          <li class="searchOptions-item active">
            <a id="songs-tab" data-toggle="tab" href="#songs" role="tab" aria-controls="songs" aria-selected="true">
              <span class="fa fa-music"></span>
              Pistas
            </a>
          </li>
          <li class="searchOptions-item">
            <a id="playlists-tab" data-toggle="tab" href="#playlists" role="tab" aria-controls="playlists" aria-selected="false">
              <span class="fa fa-list"></span>
              Listas
            </a>
          </li>
        </ul>
        <div>
        </div>
      </div>
    </div>
  </div>


  <!-- Tab panes -->
  <div class="search-main tab-content">
    <div class="tab-pane active" id="songs" role="tabpanel" aria-labelledby="songs-tab">
      <ul class="search-content-items">
        <div class="search-content-heading">
          <div class="result-counts">
            Se encontraron {{count($songs)}} pistas
          </div>
        </div>
        @foreach($songs as $song)
        <li class="search-item">
          @include('songs.song-extended-view', ['song' => $song])
        </li>
        @endforeach
      </ul>
    </div>
    <div class="tab-pane" id="playlists" role="tabpanel" aria-labelledby="playlists-tab">
      <ul class="search-content-items">
        <div class="search-content-heading">
          <div class="result-counts">
            Se encontraron {{count($playlists)}} listas
          </div>
        </div>
        @foreach($playlists as $playlist)
        <li class="search-item">
          @component('playlist.component-user-playlist', ['playlist' => $playlist])
          @endcomponent
        </li>
        @endforeach
      </ul>
    </div>
  </div>

</div>

@stop
