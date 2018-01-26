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
              <a>{{ $user->name }}</a>
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
      <div class="song-content-footer">
      </div>
    </div>
  </div>
</div>
