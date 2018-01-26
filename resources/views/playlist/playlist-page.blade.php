@extends('layouts.app')

@section('styles')
    @parent
    <link href="{{ asset('assets/css/views/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/songs/song-player.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/views/playlists/component-playlist.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="container">
  {{-- Profile header --}}
  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 profile-header">
      <div class="image-banner"id="background-default">
        <div class="row profile-image-row">
          <div class="col-md-6 playlist-values">
            <div>
              <h3 class="user-profile-name playlist-title">{{$playlist->user->name}}</h3>
            </div>
            <div>
              <h3 class="user-profile-name playlist-title">{{$playlist->name}}</h3>
            </div>
          </div>
          <div class="col-md-3 playlist-values">
            <h5 class="pull-right time-ago">{{$playlist->getTimeAgo()}}</h5>
          </div>
          <div class="col-md-3 profile-image-container">
            <div class="profile-photo">
              <img class="playlist-image" @if($playlist->image) src="{{\Storage::url($playlist->image)}}"
              @else src="{{URL::asset('images/profile-default.png')}}" @endif>
              <button class="btn btn-xs btn-default upload-profile-photo-button" data-toggle="modal" data-target="#editProfileModal">
                <i class="fa fa-camera"></i>Actualizar imagen</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-9">
      @if(Auth::user()->id == $playlist->user_id)
      <a href="#" data-toggle="modal" data-target="#editProfileModal" class="btn btn-default"><i class="fa fa-pencil"></i>&nbsp; Editar lista</a>
      <a href="#" data-toggle="modal" data-target="#deletePlaylistModal" class="btn btn-default"><i class="fa fa-trash"></i>&nbsp; Borrar lista</a>
      @endif
      <legend style="margin-top: 10px"></legend>

      <div class="row">
        <div class="col-md-3">
          <img class="playlist-profile-image" @if($playlist->user->profile_photo) src="{{\Storage::url($playlist->user->profile_photo)}}"
          @else src="{{URL::asset('images/profile-default.png')}}" @endif>
          <a class="user-name-link" href="{{url('users/'.$playlist->user->id)}}">{{$playlist->user->name}}</a>
        </div>
        <div class="col-md-9">
          <ul class="sound__trackList">
            @for($i=0; $i < count($playlist->songs); $i++)
              <li class="compactTrackList__item">
                <div class="compactTrackListItem">
                  <div class="compactTrackListItem__image">
                      <img class="sc-artwork" @if($playlist->songs[$i]->song->image) src="{{\Storage::url($playlist->songs[$i]->song->image)}}"
                      @else
                        src="{{URL::asset('images/profile-default.png')}}"
                      @endif></img>
                      <span class="compactTrackListItem__number">{{$i+1}}</span>
                      <div class="compactTrackListItem__content sc-truncate">
                        <span class="compactTrackListItem__trackTitle">
                          {{$playlist->songs[$i]->song->name}}
                        </span>
                      </div>
                  </div>
                </div>
              </li>
            @endfor
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-3">
    </div>
  </div>
  <div class="row" style="margin-top: 20px">

  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deletePlaylistModal" tabindex="-1" role="dialog" aria-labelledby="deletePlaylistModal" aria-hidden="true">
  {!! Form::open(['action' => ['PlaylistController@deletePlaylist', $playlist->id], 'method' => 'delete']) !!}
  {!! Form::token() !!}
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="title-modal">Borrar lista <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        </h3>
        <legend></legend>
        <div class="row">
          <div class="col-md-12">
            <p>¿Seguro que quieres eliminar {{$playlist->name}}? Esta acción no se puede deshacer.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            {{ Form::submit('Eliminar', ['class' => 'btn btn-default']) }}
          </div>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
</div>
<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog" aria-labelledby="editProfileModal" aria-hidden="true">
  {!! Form::open(['action' => ['PlaylistController@editPlaylist', $playlist->id], 'method' => 'put', 'files' => 'true']) !!}
  {!! Form::token() !!}
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="title-modal">Información básica <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        </h3>
        <legend></legend>
        <div class="row">
          <div class="col-md-4">
            <div class="profile-photo">
              <img class="profile-image" @if($playlist->image) src="{{\Storage::url($playlist->image)}}"
              @else src="{{URL::asset('images/profile-default.png')}}" @endif>
              <a href="#" onclick="getFileInput('image')" class="btn btn-xs btn-default upload-profile-photo-button upload-profile-photo-modal-lg">
                <i class="fa fa-camera"></i>Actualizar imagen</a>
              {{ Form::file('image', ['id' => 'image', 'style' => 'display:none', 'accept' => 'image/*']) }}
            </div>
          </div>
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  {{ Form::label('name', 'Título *', ['class' => 'form-label']) }}
                  {{ Form::text('name', $playlist->name, ['class' => 'form-control', 'required' => 'true']) }}
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group modal-label">
                    La lista quedará &nbsp;
                    <label class="radio-inline">{{ Form::radio('private', 'true', $playlist->private) }} privada</label>
                    <label class="radio-inline">{{ Form::radio('private', 'false', !$playlist->private, ['class' => 'radio']) }} pública</label>
                </div>
              </div>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        {{ Form::submit('Guardar cambios', ['class' => 'btn btn-primary', 'type' => 'button']) }}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@stop
