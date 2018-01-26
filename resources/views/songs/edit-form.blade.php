<div>
  {!! Form::open(['action' => ['SongController@updateUserSong', $user->id, $song->id], 'method' => 'put', 'files' => 'true']) !!}
  {!! Form::token() !!}
  <div class="song-form-content">
    <div class="song-form-fields">
      <div class="song-form-fields-title">
        <span class="song-form-fields-titleLabel">
          Título
        </span>
        {{ Form::text('name', $song->name, ['class' => 'song-form-fields-titleInput', 'required' => 'true']) }}
      </div>

      <div class="song-form-fields-link">
        <span class="song-form-fields-linkPrefix">
          soundcloud.com/aranchafoz/
        </span>
        {{ Form::text('public_link', $song->public_link, ['class' => 'song-form-fields-linkInput', 'required' => 'true']) }}
      </div>

      <div class="song-form-fields-image">
        <div class="song-form-imageField">
          <img class="song-form-image" @if($song->image) src="{{\Storage::url($song->image)}}"
          @else src="{{URL::asset('images/profile-default.png')}}" @endif>
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
        {{ Form::textarea('description', $song->description, ['class' => 'song-form-fields-descriptionTextarea', 'required' => 'true', 'rows' => '3', 'placeholder' => 'Describe tu pista']) }}

      </div>

      <div class="song-form-fields-private">
          {{ Form::radio('privacy', 'private', $song->private) }}
          <span class="song-form-fields-privateLabel">
            privada
          </span>
          &nbsp;
          {{ Form::radio('privacy', 'public', !$song->private) }}
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
  {!! Form::close() !!}
</div>
