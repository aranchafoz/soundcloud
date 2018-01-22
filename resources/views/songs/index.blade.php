@extends('menus.creator-navigation')

@section('styles')
    @parent
    <link href="{{ asset('assets/css/views/songs/index.css') }}" rel="stylesheet">
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
        <div class="button-group">
          <button type="button" class="btn btn-editar">
            <span class="fa fa-pencil" aria-hidden="true"></span>
            Editar pistas
            <span class="fa fa-angle-down" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-addToPlaylist">
            <span class="fa fa-plus" aria-hidden="true"></span>
            Añadir a una pista
          </button>
        </div>
      </div>
      <div class="header-ur-songs-tools-pagination">
      </div>
    </div>
  </div>
  <div class="main-ur-songs">
  </div>
</div>
@stop
