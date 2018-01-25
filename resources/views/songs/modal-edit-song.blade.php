<!-- Modal -->
<div class="modal fade" id="modalEditSong{{$song->id}}" tabindex="-1" role="dialog" aria-labelledby="modalEditSong{{$song->id}}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-edit-song">
      <div class="modal-body">
        <!-- Nav tabs -->
        <div id="nav-tabs">
          <ul role="tablist" class="nav nav-tabs">
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
        @component('songs.song-form', ['user' => $user, 'song' => $song])
        @endcomponent
      </div>
    </div>
  </div>
</div>
