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
            <li id="lista-exitos"><a href="{{ route('lista-exitos') }}">Lista de éxitos</a></li>
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
              <a data-toggle="modal" data-target="#loginModal" href="#">Inicia sesión</a>
            </li>
            <li id="register" class="myNavbar-items">
              <a data-toggle="modal" data-target="#registerModal" href="#">Crea tu cuenta</a>
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
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Email</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Contraseña</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Inicia sesión
                    </button>

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        ¿No sabes tu contraseña?
                    </a>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h3 class="title-modal">Crea tu cuenta de SoundCloud <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        </h3>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('nick') ? ' has-error' : '' }}">
                <label for="nick" class="col-md-4 control-label">Nick</label>

                <div class="col-md-6">
                    <input id="nick" type="text" class="form-control" name="nick" value="{{ old('nick') }}" required autofocus>

                    @if ($errors->has('nick'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nick') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">Email</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Contraseña</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Repite contraseña</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Continuar
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
