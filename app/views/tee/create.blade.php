@extends('db')

@section('content')

	<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Skapa tee för {{$course->name}}</h4>
   {{Form::open(['route'=>'tee.store', 'class'=>'form-horizontal style-form'])}}
    {{Form::hidden('course_id', $course->id)}}

      <div class="form-group">
          <label class="col-sm-1 col-sm-1 control-label">Färg</label>
          <div class="col-sm-5">

              {{Form::text('color', '', ['class'=>'form-control'])}}
              <span class="help-block"></span>

          </div>

        </div>

          <div class="form-group">
              <label class="col-sm-1 col-sm-1 control-label">Antal hål</label>
              <div class="col-sm-5">

                  {{Form::text('holes', '', ['class'=>'form-control'])}}
                  <span class="help-block"></span>

              </div>

            </div>

        {{Form::submit('Nästa', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

     </div>

@stop