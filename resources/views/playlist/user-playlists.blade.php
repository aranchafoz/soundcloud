@extends('layouts.app')
@section('styles')
    @parent
    <link href="{{ asset('assets/css/views/user-playlists.css') }}" rel="stylesheet">
@stop

@section('content')
<div id="home-navigation-container" class="container">
  <!-- Nav tabs -->
  <div id="nav-tabs">
    <ul role="tablist" class="nav nav-tabs">
      <li class="nav-item">
        <a aria-controls="subir" aria-selected="true" class="nav-link">
          Resumen
        </a>
      </li>
      <li class="nav-item">
        <a aria-controls="subir" aria-selected="true" class="nav-link">
          Me gusta
        </a>
      </li>
      <li class="nav-item active">
        <a data-toggle="tab" aria-controls="songs" aria-selected="false" class="nav-link active">
          Listas
        </a>
      </li>
      <li class="nav-item">
        <a aria-controls="estadisticas" aria-selected="false" class="nav-link">
          Álbumes
        </a>
      </li>

      <li class="nav-item">
        <a aria-controls="subir" aria-selected="true" class="nav-link">
          Emisoras
        </a>
      </li>

      <li class="nav-item">
        <a aria-controls="subir" aria-selected="true" class="nav-link">
          Siguiendo
        </a>
      </li>

      <li class="nav-item">
        <a aria-controls="subir" aria-selected="true" class="nav-link">
          Historial
        </a>
      </li>
    </ul>
  </div>
  <div class="tab-content tab-modal">
    <div class="tab-pane in active" id="add" role="tabpanel" aria-labelledby="add-tab">
      <div class="row">
        <div class="col-md-12">
          <h3 class="listen-playlists">Escucha tus listas:</h3>
        </div>
      </div>
      <div class="row">
        <ul class="playlist-list">
        @foreach($user->playlists as $playlist)
          <li class="playlist-item">
            @component('playlist.component-playlist', ['playlist' => $playlist])
            @endcomponent
          </li>
        @endforeach
        <ul>
      </div>
    </div>
  </div>
</div>

@stop
