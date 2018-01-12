<nav class="navbar navbar-default navbar-static-top" style="background: #333;">
  <div class="container">

    <div class="navbar-header">
      <!-- Collapsed Hamburger -->
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <!-- Branding Image -->
      <a class="navbar-brand" href="/" style="display: inline-flex; background: linear-gradient(#f70,#f30);">
        <img src="https://a-v2.sndcdn.com/assets/images/header/cloud-e365a47.png" alt="SoundCloud"  />
        @guest
            <p style="color: #fff;" >
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
            <li><a style="color: #ccc">Lista de éxitos</a></li>
        @else
            <li style="background: rgb(0, 0, 0); width: 100px; text-align: center;"><a style="color: #ccc">Inicio</a></li>
            <li style="border-color: rgb(0, 0, 0); border-width: 0 1px; border-style: solid; width: 100px; text-align: center;"><a style="color: #ccc">Colección</a></li>
        @endguest
      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @guest
            <li><a href="{{ route('login') }}" style="color: #ccc">Inicia sesión</a></li>
            <li><a href="{{ route('register') }}" style="color: #ccc">Crea tu cuenta</a></li>
            <li><a style="color: #ccc">Subir</a></li>
            <li style="height: 46px; margin: 2px;">
              <a style="width: 100%; height: 100%; background: url({{URL::asset('images/more-20.png')}}) 50% 50% no-repeat;"></a>
            </li>
        @else
            <li><a style="color: #ccc">Hazte Pro</a></li>
            <li><a style="color: #ccc">Subir</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="color: #ccc">
                    {{ Auth::user()->name }}
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="/profile">
                            <p class="text-primary" style="color: #ccc"> Profile </p>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <p class="text-primary" style="color: #ccc"> Logout </p>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
            <li style="height: 46px; width: 40px; margin: 2px;">
              <a style="width: 100%; height: 100%; background: url({{URL::asset('images/notifications-20.png')}}) 50% 50% no-repeat;"></a>
            </li>
            <li style="height: 46px; width: 40px; margin: 2px;">
              <a style="width: 100%; height: 100%; background: url({{URL::asset('images/messages-20.png')}}) 50% 50% no-repeat;"></a>
            </li>
            <li style="height: 46px; width: 40px; margin: 2px;">
              <a style="width: 100%; height: 100%; background: url({{URL::asset('images/more-20.png')}}) 50% 50% no-repeat;"></a>
            </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
