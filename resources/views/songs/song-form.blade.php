<div>
  <div class="song-form-content">
    <div class="song-form-fields">
      <div class="song-form-fields-title">
        <span class="song-form-fields-titleLabel">
          Título
        </span>
        <input class="song-form-fields-titleInput">
      </div>

      <div class="song-form-fields-link">
        <span class="song-form-fields-linkPrefix">
          soundcloud.com/aranchafoz/
        </span>
        <input class="song-form-fields-linkInput" type="text" value="k-pasa-k-vols" aria-required="true" aria-invalid="false" aria-describedby="">
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
        <textarea class="song-form-fields-descriptionTextarea" rows="3" placeholder="Describe tu pista" aria-required="false" aria-invalid="false" aria-describedby="">
          Hola k ase
        </textarea>
      </div>

      <div class="song-form-fields-private">
          <input type="radio" value="private">
          <span class="song-form-fields-privateLabel">
            privada
          </span>
          &nbsp;
          <input type="radio" value="public">
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
        <button class="song-form-saveButton">
          Guardar
        </button>
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
