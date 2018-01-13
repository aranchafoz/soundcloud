<nav id="navbar" class="navbar navbar-default navbar-static-top">
  <div class="container">

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

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
            <li id="login"><a href="{{ route('login') }}">Inicia sesión</a></li>
            <li id="register"><a href="{{ route('register') }}">Crea tu cuenta</a></li>
            <li id="subir-guest"><a>Subir</a></li>
        @else
            <li id="hazte-pro"><a>Hazte Pro</a></li>
            <li id="subir"><a>Subir</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }}
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="/user/{{ Auth::user()->id}}">
                            <p class="text-primary"> Profile </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <p class="text-primary"> Logout </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            <li class="myNavbar-icon">
              <a style="background: url({{URL::asset('images/notifications-20.png')}}) 50% 50% no-repeat;"></a>
            </li>
            <li class="myNavbar-icon">
              <a style="background: url({{URL::asset('images/messages-20.png')}}) 50% 50% no-repeat;"></a>
            </li>
        @endguest
        <li class="myNavbar-icon">
          <a style="background: url({{URL::asset('images/more-20.png')}}) 50% 50% no-repeat;"></a>
        </li>
      </ul>
    </div>
  </div>
</nav>
