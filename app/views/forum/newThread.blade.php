@extends('master')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <h4>Skapa ny tråd i kategorin {{$category->title}}</h4>
    </div>
    <div class="col-sm-12">
        {{Form::open(['method' => 'POST', 'route' => ['newThread.store', $category->id], 'id'=>'thread'])}}
        <div class="form-group">
        {{Form::label('title' , 'Titel')}}
        {{Form::text('title', null, ['class' => 'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
        </div>
        <div class="form-group">
        {{Form::label('body' , 'Innehåll * Detta måste fyllas i.')}}
        {{Form::textarea('body', null, ['class' => 'form-control', 'id'=>"area"])}}
        </div>
        <div class="form-group">
        {{Form::submit('Spara', ['class' => 'btn btn-primary btn-primary'])}}
        </div>
        {{Form::close()}}
    </div>
</div>

@stop


@section('scripts')
<script>

    $.validate({
      form : '#thread'
    });

</script>
@stop