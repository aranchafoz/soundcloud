<!-- Modal -->
<div class="modal fade" id="modalSeeCommentsSong{{$song->id}}" tabindex="-1" role="dialog" aria-labelledby="modalSeeCommentsSong{{$song->id}}" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content modal-content-edit-song">
      <div class="modal-body">
        <h3><strong>{{$song->name}}</strong> <small>Comments</small></h3>
        <hr/>
        @foreach($comments as $comment)
        <div class="comment-card card">
          <div class="comment-card-image">
            <img class="comment-card-user-photo" @if($song->user->profile_photo) src="{{\Storage::url($song->user->profile_photo)}}"
            @else src="{{URL::asset('images/profile-default.png')}}" @endif>
          </div>
          <div>
            <div class="comment-card-title card-title">
              <h5>
                {{$comment->user->name}}
              </h5>
            </div>
            <div class="comment-card-body card-body">
              {{$comment->content}}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
