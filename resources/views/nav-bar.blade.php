<nav id="navbar" class="navbar navbar-default navbar-static-top">
  <div id="myNavbar-container" class="container">

    <div class="navbar-header">
      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a id="navbar-brand" class="navbar-brand" href="/">
        <img src="https://a-v2.sndcdn.com/assets/images/header/cloud-e365a47.png" alt="SoundCloud"  />
        @guest
            <p id="brand-name">
              SOUNDCLOUD
            </p>
        @endguest
      </a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
        <!-- Authentication Links -->
        @guest
            <li id="lista-exitos"><a>Lista de éxitos</a></li>
        @else
            <li id="inicio"><a href="{{ route('home') }}">Inicio</a></li>
            <li id="coleccion"><a>Colección</a></li>
        @endguest
      </ul>
      <ul class="nav navbar-nav navbar-middle">
        {!! Form::open(['action' => ['SearchController@search'], 'method' => 'post', 'class' => 'navbar-form navbar-left']) !!}
        {!! Form::token() !!}
          <div class="input-group">
            {{ Form::text('search', null, ['class' => 'form-control', 'placeholder' => 'Buscar artistas, grupos y pistas']) }}
            <span class="input-group-btn span-btn-search">
              <button class="btn btn-default" type="submit">
                <img src="https://a-v2.sndcdn.com/assets/images/header/search-dbfe5cb.svg"  />
              </button>
            </span>
          </div>
          {!! Form::close() !!}
      </ul>
      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
            <li id="login" class="myNavbar-items">
              <a href="{{ route('login') }}">Inicia sesión</a>
            </li>
            <li id="register" class="myNavbar-items">
              <a href="{{ route('register') }}">Crea tu cuenta</a>
            </li>
            <li id="subir-guest" class="myNavbar-items">
              <a href="{{ route('login') }}">Subir</a>
            </li>
        @else
            <li id="hazte-pro" class="myNavbar-items">
              <a href="https://soundcloud.com/pro?ref=t099">Hazte Pro</a>
            </li>
            <li id="subir" class="myNavbar-items">
              <a href="/user/{{ Auth::user()->id}}/songs/subir">Subir</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }}
                    &nbsp;
                    <img src="https://a-v2.sndcdn.com/assets/images/header/dropdown-cf3420a.svg"  />
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{url('/user/'.Auth::user()->id)}}">
                          <img src="https://a-v2.sndcdn.com/assets/images/header/profile/user-853e629.svg" alt="Perfil"  />
                          &nbsp;
                          Perfil
                        </a>
                    </li>
                    <li>
                        <a href="{{url('/user/'.Auth::user()->id.'/playlists')}}">
                          <img src="https://a-v2.sndcdn.com/assets/images/header/profile/playlist-71fefc0.svg" alt="Listas"  />
                          &nbsp;
                          Listas
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{url('/user/'.Auth::user()->id.'/songs')}}">
                          <img src="https://a-v2.sndcdn.com/assets/images/header/profile/track_manager_light-e8f84d9.png" alt="Perfil"  />
                          &nbsp;
                          Pistas
                        </a>
                    </li>
                </ul>
            </li>
            <br id="myButtons-separator" />
            <li id="notificaciones" class="myNavbar-icon myNavbar-items">
              <img src="https://a-v2.sndcdn.com/assets/images/header/activities-66caaa5.svg" alt="Notificaciones" />

            </li>
            <li id="mensajes" class="myNavbar-icon myNavbar-items">
              <img src="https://a-v2.sndcdn.com/assets/images/header/messages-f517d0e.svg" alt="Mensajes" />
            </li>
        @endguest
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                <img src="https://a-v2.sndcdn.com/assets/images/header/more-0e9e752.svg" alt="More"  />
              </a>
              <ul class="dropdown-menu" role="menu">
                  <li>
                      <a href="/developers">
                        Quiénes somos
                      </a>
                  </li>
                  <li role="separator" class="divider"></li>
                  @guest
                  <li>
                    <a href="https://soundcloud.com/pro?ref=t099">Hazte Pro</a>
                  </li>
                  @else
                  <li>
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Cerrar sesión
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
                  @endguest
              </ul>
          </li>
      </ul>
    </div>
  </div>
</nav>
