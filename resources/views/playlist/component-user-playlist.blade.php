<div class="song-container">
  <div class="song-body">
    <div class="song-body-image">
      <a href="#">
        <img class="song-image" src="{{asset('images/profile-default.png')}}" >
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
              <a>{{ $playlist->user->name }}</a>
            </div>
            <a>{{ $playlist->name }}</a>
          </div>
          <div class="titleContainer-spacer"></div>
          <div class="titleContainer-additional">
            <div class="uploadTime">
              <span>
                {{ $playlist->getTimeAgo() }}
              </span>
            </div>
            <div class="privateStatus">
              @if($playlist->private)
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
        <ul class="sound__trackList">
          @for($i=0; $i < count($playlist->songs) && $i < 5; $i++)
            <li class="compactTrackList__item">
              <div class="compactTrackListItem">
                <div class="compactTrackListItem__image">
                    <img class="sc-artwork" @if($playlist->songs[$i]->song->image) src="{{\Storage::url($playlist->songs[$i]->song->image)}}"
                    @else
                      src="{{URL::asset('images/profile-default.png')}}" @endif ></img>
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
</div>
