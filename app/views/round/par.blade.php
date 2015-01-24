@extends('db')

@section('content')

	<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Skapa par-runda - {{$course->name}}</h4>
   {{Form::open(['method'=>'POST', 'route'=>['account-round-add-score'], 'class'=>'form-horizontal style-form'])}}


      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Välj Medspelare</label>
          <div class="col-sm-10">
                      {{Form::select('id', $result,'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                       <span class="help-block"></span>

          </div>

      </div>

        {{Form::submit('Nästa', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

     </div>

@stop