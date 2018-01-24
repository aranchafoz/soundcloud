<!-- Modal -->
<div class="modal fade" id="modalPlaylist{{$song}}" tabindex="-1" role="dialog" aria-labelledby="modalPlaylist{{$song}}" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    {{-- {!! Form::open(['action' => ['UserController@putEditProfile', $user->id], 'method' => 'put', 'files' => 'true']) !!}
    {!! Form::token() !!}--}}
    <div class="modal-content">
      <div class="modal-body">
        <div id="nav-tabs">
          <ul id="playlistModalTabs" role="tablist" class="nav nav-tabs">
            <li class="nav-item active">
              <a class="nav-link active" id="add-tab" data-toggle="tab" href="#add" aria-controls="add" aria-selected="true">
                <h3>Añadir a una lista</h3>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="create-tab" data-toggle="tab" href="#create" aria-controls="create" aria-selected="true">
                <h3>Crear Lista</h3>
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content" id="playlistModalTabs">
          <div class="tab-pane in active" id="add" role="tabpanel" aria-labelledby="add-tab">
            <div class="row">
              <ul>
                @foreach ($playlists as $playlist)
                  <li>{{$playlist->name}}</li>
                @endforeach
              </ul>
            </div>
          </div>
          <div class="tab-pane in" id="create" role="tabpanel" aria-labelledby="create-tab">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group modal-label">
                  {{ Form::label('name', 'Título de la lista *', ['class' => 'form-label']) }}
                  {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group modal-label">
                    La lista quedará &nbsp;
                    <label class="radio-inline">{{ Form::radio('private', 'true', false, ['selected' => 'selected']) }} privada</label>
                    <label class="radio-inline">{{ Form::radio('private', 'false', false, ['class' => 'radio']) }} pública</label>
                    {{ Form::submit('Guardar', ['class' => 'btn btn-save-modal pull-right']) }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{--{!! Form::close() !!}--}}
  </div>
</div>
