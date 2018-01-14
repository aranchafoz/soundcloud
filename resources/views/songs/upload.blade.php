@extends('menus.creator-navigation')

@section('styles')
    @parent
    <link href="{{ asset('assets/css/views/songs/upload.css') }}" rel="stylesheet">
@stop

@section('creator-content')
<div class="main-upload">
  <div class="main-upload-container">
    <h1 class="main-upload-title">Subir a SoundCloud</h1>
    <div class="main-upload-chooser">
      <button>
        Selecciona un archivo para subir
      </button>
    </div>
    <div class="main-upload-additional">
      <label>
        <input type="checkbox" checked="checked" />
        <span>Crear una lista cuando hay varios archivos seleccionados</span>
      </label>
    </div>
    <div class="main-upload-pro">
      <div class="main-upload-pro-info">
        <div>
          Te quedan 180 minutos.
          <br>
          <span>Las cuentas Pro ofrecen más tiempo de subida y funciones avanzadas.</span>
        </div>
      </div>
      <div class="main-upload-pro-button">
        <button>
          Hazte Pro
        </button>
      </div>
    </div>
  </div>
</div>
@stop
