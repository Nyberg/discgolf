@extends('master')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h3 class="text-center">Skapa ny tråd</h3>
    </div>
    <div class="col-sm-12">
        {{Form::model($thread,['method' => 'POST', 'route' => ['threadUpdate', $thread->id]])}}
        <div class="form-group">
        {{Form::label('title' , 'Titel')}}
        {{Form::text('title', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group">
        {{Form::label('bory' , 'Innehåll')}}
        {{Form::textarea('body', null, ['class' => 'form-control'])}}
        </div>
        <div class="form-group text-center">
        {{Form::submit('Spara', ['class' => 'btn btn-primary btn-sm'])}}
        </div>
        {{Form::close()}}
    </div>
</div>

@stop
