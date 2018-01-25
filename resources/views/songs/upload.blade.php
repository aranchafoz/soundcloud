@extends('menus.creator-navigation')

@section('styles')
    @parent
    <link href="{{ asset('assets/css/views/songs/upload.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/components/modal-nav-tabs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/songs/song-form.css') }}" rel="stylesheet">
@stop

@section('creator-content')
<div class="main-upload">
  {!! Form::open(['action' => ['SongController@postUserSong', $user->id ], 'method' => 'post', 'files' => 'true']) !!}
  {!! Form::token() !!}
  <div class="main-upload-container">
    <h1 class="main-upload-title">Subir a SoundCloud</h1>
    <div class="main-upload-chooser">
      <button onclick="getFileInput('song_audio')" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="collapseInfoUpload collapseCreateSongForm">
        Selecciona un archivo para subir
      </button>
      {{ Form::file('song_audio', ['id' => 'song_audio', 'style' => 'display:none', 'accept' => 'audio/*']) }}
    </div>
    <div class="main-upload-additional">
      <label>
        <input type="checkbox" checked="checked" />
        <span>Crear una lista cuando hay varios archivos seleccionados</span>
      </label>
    </div>
    <div class="main-upload-pro multi-collapse collapseInfoUpload show">
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

  <!-- Create Song Form -->
  <div class="create-song-form multi-collapse collapseCreateSongForm">
    <!-- Nav tabs -->
    <div id="nav-tabs">
      <ul role="tablist" class="nav nav-tabs song-form-tabs">
        <li class="modal-nav-item active">
          <a data-toggle="tab" aria-controls="info-basica" aria-selected="true" class="nav-link active">
            <h3>Información básica</h3>
          </a>
        </li>
        <li class="modal-nav-item">
          <a aria-controls="metadatos" aria-selected="false" class="nav-link">
            <h3>Metadatos</h3>
          </a>
        </li>
        <li class="modal-nav-item">
          <a aria-controls="permisos" aria-selected="false" class="nav-link">
            <h3>Permisos</h3>
          </a>
        </li>
      </ul>
    </div>
    <div>
      <div class="song-form-content">
        <div class="song-form-fields">
          <div class="song-form-fields-title">
            <span class="song-form-fields-titleLabel">
              Título
            </span>
            {{ Form::text('name', null, ['class' => 'song-form-fields-titleInput', 'required' => 'true']) }}
          </div>

          <div class="song-form-fields-link">
            <span class="song-form-fields-linkPrefix">
              soundcloud.com/aranchafoz/
            </span>
            {{ Form::text('public_link', null, ['class' => 'song-form-fields-linkInput', 'required' => 'true']) }}
          </div>

          <div class="song-form-fields-image">
            <div class="song-form-imageField">
              <img class="song-form-image" src="{{URL::asset('images/profile-default.png')}}">
              <div class="song-form-imageButton">
                <a href="#" onclick="getFileInput('song_photo')" class="btn btn-xs btn-default upload-song-photo-button upload-song-photo-modal-lg">
                  <i class="fa fa-camera"></i>
                  Actualizar imagen
                </a>
                {{ Form::file('song_photo', ['id' => 'song_photo', 'style' => 'display:none', 'accept' => 'image/*']) }}
              </div>
            </div>
          </div>

          <div class="song-form-fields-description">
            <span class="song-form-fields-descriptionLabel">
              Descripción
            </span>
            {{ Form::textarea('description', null, ['class' => 'song-form-fields-descriptionTextarea', 'required' => 'true', 'rows' => '3', 'placeholder' => 'Describe tu pista']) }}

          </div>

          <div class="song-form-fields-private">
              {{ Form::radio('privacy', 'private', false) }}
              <span class="song-form-fields-privateLabel">
                privada
              </span>
              &nbsp;
              {{ Form::radio('privacy', 'public', true) }}
              <span class="song-form-fields-privateLabel">
                pública
              </span>
          </div>
        </div>

        <div class="song-form-buttons">
          <div>
            <div class="song-form-requieredFieldsLeyend">
              <span>*</span>
              Campos obligatorios
            </div>
            {{ Form::submit('Guardar cambios',['class' => 'song-form-saveButton']) }}
            <button class="song-form-cancelButton">
              Cancelar
            </button>
          </div>
        </div>

        <div class="song-form-footer">
          <strong>Importante:</strong> al compartir este material, confirmas que tu pista cumple nuestras Condiciones de uso y que no vulneras los derechos de nadie. En caso de duda, consulta nuestras páginas de Información sobre derechos de autor y las PF antes de subir el material.
        </div>

      </div>
    </div>

  </div>
  {!! Form::close() !!}
</div>
@stop
