
<div class="col-lg-12 hr">
<div class="col-lg-1">
<img src="{{getUserImage($comment->user_id)}}" class="img-circle pull-left" width="60px">
</div>
<div class="col-lg-10">
<p>{{$comment->created_at}} av <a href="/user/{{$comment->user_id}}/show">{{getUser($comment->user_id)}}</a></p>
<p>{{$comment->body}}</p>

</div>
<div class="col-lg-1">

@if(Auth::check())

@if($comment->user_id == Auth::user()->id)
    {{Form::open(['method'=>'DELETE', 'route'=>['comment.destroy', $comment->id]])}}
    {{Form::submit('Radera', ['class'=>'btn btn-danger btn-xs pull-right'])}}
    {{Form::close()}}
@endif

@endif
</div>

</div>
