@extends('master')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h4 class="">Redigera kommentar</h4>
    </div>

    <div class="col-sm-12 col-md-offset-1">
    <div class="col-sm-10  well">
    <p>{{$thread->author->first_name . ' ' . $thread->author->last_name}} skrev: </p>
    <p>{{$thread->body}}</p>
    </div>
    </div>

    <div class="col-sm-12">
        {{Form::model($comment,['method' => 'POST', 'route' => ['forum-update-comment', $comment->id]])}}
        <div class="form-group">
        {{Form::label('body' , 'Innehåll')}}
        {{Form::textarea('body', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group text-center">
        {{Form::submit('Uppdatera', ['class' => 'btn btn-primary btn-sm'])}}
        </div>
        {{Form::close()}}
    </div>
</div>

@stop
