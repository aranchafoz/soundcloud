<!-- Modal -->
<div class="modal fade" id="modalSeeCommentsSong{{$song->id}}" tabindex="-1" role="dialog" aria-labelledby="modalSeeCommentsSong{{$song->id}}" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content modal-content-edit-song">
      <div class="modal-body">
        @foreach($comments as $comment)
        <div class="card">
          <div class="card-title">
            <h5>
              {{$comment->user->name}}
            </h5>
          </div>
          <div class="card-body">
            {{$comment->content}}
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
