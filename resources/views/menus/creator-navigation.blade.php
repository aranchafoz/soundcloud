@extends('layouts.app')

@section('styles')
    @parent
    <link href="{{ asset('assets/css/views/components/nav-tabs.css') }}" rel="stylesheet">
@stop

@section('content')
<div id="creator-navigation-container" class="container">
  <div id="nav-tabs">
    <ul role="tablist" class="nav nav-tabs">
      @if(Request::is('*/songs/subir'))
          <li class="nav-item active">
            <a id="subir-tab" href="{{ url('/user/'. Auth::user()->id .'/songs/subir') }}" aria-controls="subir" aria-selected="true" class="nav-link active">
              Subir
            </a>
          </li>
          <li class="nav-item">
            <a id="songs-tab" href="/user/{{ Auth::user()->id}}/songs" aria-controls="songs" aria-selected="false" class="nav-link">
              Tus pistas
            </a>
          </li>
      @else
          <li class="nav-item">
            <a id="subir-tab" href="{{ url('/user/'. Auth::user()->id .'/songs/subir') }}" aria-controls="subir" aria-selected="false" class="nav-link">
              Subir
            </a>
          </li>
          <li class="nav-item active">
            <a id="songs-tab" href="/user/{{ Auth::user()->id}}/songs" aria-controls="songs" aria-selected="true" class="nav-link active">
              Tus pistas
            </a>
          </li>
      @endif
      <li class="nav-item">
        <a data-toggle="tab" aria-controls="estadisticas" aria-selected="false" class="nav-link">
          Estadísticas
        </a>
      </li>
      <li class="nav-item">
        <a data-toggle="tab" aria-controls="planes" aria-selected="false" class="nav-link">
          Planes Pro
        </a>
      </li>
      <li class="nav-item">
        <a data-toggle="tab" aria-controls="pulse" aria-selected="false" class="nav-link">
          Pulse
        </a>
      </li>
    </ul>
  </div>
  @yield('creator-content')
</div>
@stop
