<div class="song-container">
  <div class="song-body">
    <div class="song-body-image">
      <a href="#">
        <img class="song-image" @if($song->image) src="{{\Storage::url($song->image)}}"
        @else src="{{URL::asset('images/profile-default.png')}}" @endif>
      </a>
    </div>
    <div class="song-content">
      <div class="song-content-header">
        <div class="song-content-header-titleContainer">
          <div class="titleContainer-playButton">
            <a title="Reproducir">
              <img src="https://a-v2.sndcdn.com/assets/images/buttons/hero/play-69601b9.svg" >
            </a>
          </div>
          <div class="titleContainer-usernameTitle">
            <div class="username">
              <a>{{ $song->user->name }}</a>
            </div>
            <a>{{ $song->name }}</a>
          </div>
          <div class="titleContainer-spacer"></div>
          <div class="titleContainer-additional">
            <div class="uploadTime">
              <span>
                {{ $song->getTimeAgo() }}
              </span>
            </div>
            <div class="privateStatus">
              @if($song->private)
                <span class="fa fa-lock">
                  <span>&nbsp;Privada</span>
                </span>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="song-content-waveform">
      </div>
      <div class="song-content-comment">
        <div class="song-content-commentWrapper">
          <div class="song-content-comment-avatar">
            <img class="song-comment-user-image" @if(Auth::user()->image) src="{{\Storage::url(Auth::user()->image)}}"
            @else src="{{URL::asset('images/profile-default.png')}}" @endif>
          </div>
          <div class="song-content-comment-input">
            <input type="text" class="song-comment-input" title="Escribe un comentario" placeholder="Escribe un comentario">
          </div>
        </div>
      </div>
      <div class="song-content-footer">
        <div class="song-footer-rigth">
          @if(count($song->comments) > 0)
            <a href="" class="see-all-comments-icon" data-toggle="modal" data-target="#modalSeeCommentsSong{{$song->id}}">
               <span class="fa fa-comment"></span>
               1
            </a>
            @component('songs.modal-song-comments', ['song' => $song, 'comments' => $song->comments])
            @endcomponent
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
