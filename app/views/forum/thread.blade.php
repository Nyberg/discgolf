@extends('master')

@section('content')

<div class="row">
<div class="col-md-10">
<ol class="breadcrumb">
    <li><a href="/forum">Forum</a></li>
    <li><a href="/forum/category/{{$thread->category_id}}">{{$thread->category->title}}</a> </li>
    <li class="active">{{$thread->title}}</li>
</ol>
        <div class="panel panel-default">
        <div class="panel-heading">

            <h5>{{$thread->title}} <small>{{$thread->created_at}}</small>
            @if(Auth::check() && Auth::user()->hasRole('Admin') && $thread->status == 1)
                <a href="#" data-toggle="modal" data-target="#thread_lock"  class="btn btn-danger btn-xs pull-right">Lås tråd</a>
            @else
                 <button class="btn btn-danger btn-xs pull-right">Tråden är låst</button>
            @endif
            @if(Auth::check() && Auth::id() == $thread->author_id)

                <a id="{{$thread->id}}" href="#" class="btn btn-danger btn-xs delete_thread btn-xs pull-right" data-toggle="modal" data-target="#thread_delete">Ta bort</a>
                <a href="/forum/thread/edit/{{$thread->id}}" class="btn btn-primary btn-xs pull-right">Redigera tråd</a>
            @endif

            </h5>

        </div>
        <div class="panel-body dark-sh-well-no-radius">
        <div class="col-sm-2 text-center thread-first">
       <img src="{{$thread->author->image}}" class="img-responsive thumbnail center-block" width="100px" height="100px" />
       <p class="{{$thread->author}}">{{$thread->author->first_name . ' ' . $thread->author->last_name}}</p>
       <small>Klubb: {{$thread->author->club->name}}</small>
     <br /><small class="thread-margin">Inlägg: {{count($thread->author->threads) + count($thread->author->forum_comments)}}</small>
        </div>
            <div class="col-sm-10">
             <p class="thread-p">{{$thread->body}}</p>
            </div>
            <div class="col-sm-10">

            </div>

            <hr class="divider" />
            </div>

        </div>
    </div>
    <div class="col-md-2">
    <p>Annonsplats</p>
    </div>
</div>

<div class="row">
    <div class="col-sm-10">
        @foreach($comments as $comment)
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-body dark-sh-well-no-radius">
                    <div class="col-sm-2 text-center thread">
                    <small class="posted">{{$comment->created_at}}</small>
                           <img src="{{$comment->author->image}}" class="img-responsive thumbnail center-block" width="100px" height="100px" />
                           <p class="{{$comment->author}}">{{$comment->author->first_name . ' ' . $comment->author->last_name}}</p>
                           <small>Klubb: {{$comment->author->club->name}}</small>
                         <br /><small class="thread-margin">Inlägg: {{count($thread->author->threads) + count($thread->author->forumcomments)}}</small>
                         <p class="thread-options"><a href="/forum/comment/{{$comment->id}}/edit">Redigera</a> | <a href="#" class="" data-toggle="modal" data-target="#comment-delete"><span id="{{$comment->id}}" class="fui-cross delete_comment">Ta bort</span></a></p>
                    </div>

                    <div class="col-sm-10">
                        <p>{{$comment->body}}</p>
                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="col-sm-2">

    </div>
</div>

<div class="row">
    <div class="col-sm-10 text-center">
    {{$comments->links()}}
    </div>
</div>
<div class="row">
    <div class="col-sm-10">
    @if(Auth::check())
    @else
         <button class="btn btn-warning btn-sm">Du måste vara inloggad för att kunna kommentera</button>
    @endif
    @if(Auth::check() && $thread->status == 1)
     <a href="#" data-toggle="modal" data-target="#comment_form" class="btn btn-primary btn-sm">Svara på tråd</a>
    @else
     <button class="btn btn-danger btn-sm">Tråden är låst</button>
    @endif
    </div>
</div>

 <div class="modal fade" id="comment_form" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                            </button>
                            <h4 class="modal-title">Kommentera</h4>
                        </div>
                        <div class="modal-body">
                            {{Form::open(['method' => 'post', 'route' => ['forum-store-comment', $thread->id],'id' => 'target_comment_form'])}}
                            <div class="form-group">

                            {{Form::textarea('body', null, ['class' => 'form-control'])}}
                            </div>

                        </div>
                        <div class="modal-footer">
                        {{Form::submit('Spara inlägg', ['class'=>'btn btn-default'])}}
                        {{Form::close()}}
                            <button type="button" class=" btn btn-danger" data-dismiss="modal">Stäng</button>

                        </div>
                    </div>
                </div>
            </div>


            @if(Auth::check() && Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Utvecklare'))
                            <div class="modal fade" id="comment-delete" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">Ta bort kommentar</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Är du säker på att du vill ta bort denna kommentar?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Stäng</button>
                                            <a id="btn_delete_comment" class="btn btn-primary">Ta bort</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(Auth::check() && Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Utvecklare'))
                            <div class="modal fade" id="thread_delete" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">Ta bort tråd.</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Är du säker på att du vill ta bort denna tråd?  <br /> <small>Alla inlägg kommer också att tas bort.</small></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Stäng</button>
                                            <a id="btn_delete_thread" class="btn btn-primary">Ta bort</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(Auth::check() && Auth::user()->hasRole('Admin') || Auth::check() && Auth::user()->hasRole('Utvecklare'))
                            <div class="modal fade" id="thread_lock" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">
                                            <span aria-hidden="true">&times;</span>
                                            <span class="sr-only">Close</span>
                                            </button>
                                            <h4 class="modal-title">Lås tråd.</h4>
                                        </div>
                                        {{Form::open(['method' => 'post', 'route' => ['forum-lock-thread', $thread->id],'id' => 'target_lock_form'])}}
                                        <div class="modal-body">
                                            <p>Är du säker på att du vill låsa denna tråd?  <br /></p>
                                        </div>
                                        {{Form::close()}}
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Stäng</button>
                                            <a id="btn_lock_thread" class="btn btn-primary">Lås</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
@stop
@section('javascript')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@stop