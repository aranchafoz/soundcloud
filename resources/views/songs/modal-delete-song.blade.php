<!-- Modal -->
<div class="modal fade" id="modalDeleteSong{{$song->id}}" tabindex="-1" role="dialog" aria-labelledby="modalDeleteSong{{$song->id}}" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content modal-content-delete-song">
      <div class="modal-body">
        <section class="modal-delete-song-view">
          @include('songs.song-extended-view', ['song' => $song, 'user' => $user])
        </section>
        <span class="modal-delete-song-divider"></span>
        <section class="modal-delete-song-decisionContainer">
          <h2 class="delete-song-decisionContainer-title">
            ¿Eliminar esta pista permanentemente?
          </h2>
          <div class="delete-song-decisionContainer-infoContainer">
            <div class="delete-song-decisionContainer-info">
              <div class="delete-song-decisionContainer-info-text">
                La eliminación de esta pista es irreversible. Perderás todas las reproducciones, los Me gusta y los comentarios de la pista, y no podrás recuperarlos.
              </div>
              <div class="delete-song-decisionContainer-info-buttons">
                <span type="button" class="delete-song-decisionContainer-info-cancelButton" data-dismiss="modal">
                  Cancelar
                </span>
                {!! Form::open(['action' => ['SongController@deleteUserSong', $user->id, $song->id], 'method' => 'delete']) !!}
                {!! Form::token() !!}
                  {{ Form::submit('Eliminar para siempre',['class' => 'delete-song-decisionContainer-info-deleteButton']) }}
                {!! Form::close() !!}
              </div>
            </div>
            <div class="delete-song-decisionContainer-info">
              <div class="delete-song-decisionContainer-info-text">
                No elimines ninguna pista más. Desbloquea el tiempo ilimitado de subida y la capacidad de sustituir pistas con un plan Pro.
              </div>
              <div class="delete-song-decisionContainer-info-buttons">
                <span class="delete-song-decisionContainer-info-subcriptionButton">
                  Más información
                </span>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>
