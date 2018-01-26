<div class="playControls-container">
  <div class="playControls-container_inner">
    <div class="playControls-container_wrapper">

      <div class="playControls__bg"></div>

      <div class="playControls__elements">
        
        <button class="playControls__play" tabindex="" title="Reproducir actual">
          Reproducir actual
        </button>


        <div class="playControls__timeline">
          <div class="playbackTimeline is-scrubbable has-sound">
            <div class="playbackTimeline__timePassed">
              <span class="sc-visuallyhidden">Hora actual: 0 segundos</span>
              <span aria-hidden="true">0:00</span>
            </div>
            <div class="playbackTimeline__progressWrapper" role="progressbar" aria-valuemax="179" aria-valuenow="0" aria-valuetext="0 segundos">
              <div class="playbackTimeline__progressBackground"></div>
              <div class="playbackTimeline__progressBar" style="width: 0px;"></div>
              <div class="playbackTimeline__progressHandle sc-ir" style="left: 0px;"></div>
            </div>
            <div class="playbackTimeline__duration">
              <span class="sc-visuallyhidden">Duración: 2 minutos 59 segundos</span>
              <span aria-hidden="true">2:59</span>
            </div>
          </div>
        </div>


        <div class="playControls__soundBadge">
          <div class="playbackSoundBadge paused">
            <a href="/marshmellomusic/movingon" class="playbackSoundBadge__avatar sc-media-image" tabindex="-1">
              <div class="image" style="height: 30px; width: 30px;">
                <!-- Song image -->
                <img class="song-image" src="{{asset('images/profile-default.png')}}" >
              </div>
            </a>
            <div class="playbackSoundBadge__titleContextContainer">
              <!-- Song -> user -> name -->
              <a class="playbackSoundBadge__lightLink sc-link-light sc-truncate" title="marshmello">
                marshmello
              </a>

              <div class="playbackSoundBadge__title">
                <a href="/marshmellomusic/movingon" class="playbackSoundBadge__titleLink sc-truncate" title="Marshmello - Moving On (Original Mix)">
                  <span class="sc-visuallyhidden">
                    Pista actual: Marshmello - Moving On (Original Mix)
                  </span>
                  <!-- Song -> name  -->
                  <span aria-hidden="true">
                    Marshmello - Moving On (Original Mix)
                  </span>
                </a>
              </div>
            </div>


          </div>
        </div>
      </div>

      <div class="playControls__panel">
        <div class="playControlsPanel"></div>
      </div>


    </div>
  </div>
</div>
