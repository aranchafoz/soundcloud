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
        <div class="tools-button-group">
          <button type="button" class="btn btn-editar">
            <span class="fa fa-pencil" aria-hidden="true"></span>
            Editar pistas
            <span class="fa fa-angle-down" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-addToPlaylist">
            <span class="fa fa-plus" aria-hidden="true"></span>
            Añadir a una lista
          </button>
        </div>
      </div>
      <div class="header-ur-songs-tools-pagination">
        <div class="header-ur-songs-tools-pagination-numbers">
          <span>
            1 - 1 de 1 pistas
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
  <div class="main-ur-songs">
  </div>
</div>
@stop
