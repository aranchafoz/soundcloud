<div class="item-playlist">
  <div class="image-item-playlist">
    <img class="image-playlist" src=@if($playlist->image) "{{\Storage::url($playlist->image)}}"
    @else "{{URL::asset('images/profile-default.png')}}" @endif>
  </div>
  <div class="description-playlist">
    <div><a class="user-name-playlist" href="{{url('/user/'.$playlist->user->id)}}">{{$playlist->user->name}}</a></div>
    <div><a class="playlist-name-playlist" href="{{url('/playlists/'.$playlist->id)}}">{{$playlist->name}}</a></div>
  </div>
</div>
