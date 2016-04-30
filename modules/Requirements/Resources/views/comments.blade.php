@forelse($comments as $comment)
<div class="col-sm-12">
    <div class="row">
        <div class="well">
            <p>{!!$comment->comment!!}</p>
            <p>- {!!$comment->name!!}, {!!date('d/m/Y \a\\t h:i A', strtotime($comment->created_at))!!}</p>
        </div>
    </div>
</div>
@empty
<div class="col-sm-12">
    <div class="row">
        <div class="well">
            <p>No comments so far.</p>
        </div>
    </div>
</div>
@endforelse