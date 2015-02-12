@extends('db')

@section('content')

	<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Skapa tee för {{$course->name}}</h4>
   {{Form::open(['route'=>'tee.store', 'class'=>'form-horizontal style-form', 'id'=>'tee'])}}
    {{Form::hidden('course_id', $course->id)}}

      <div class="form-group">
          <label class="col-sm-1 col-sm-1 control-label">Färg</label>
          <div class="col-sm-5">

              {{Form::text('color', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}
              <span class="help-block"></span>

          </div>

        </div>

          <div class="form-group">
              <label class="col-sm-1 col-sm-1 control-label">Antal hål</label>
              <div class="col-sm-5">

                  {{Form::number('holes', '', ['class'=>'form-control', 'data-validation'=>'number', 'data-validation-allowing'=>'range[9;27]', 'data-validation-error-msg'=>'Du måste ange ett nummer mellan 9 och 27'])}}
                  <span class="help-block"></span>

              </div>

            </div>

        {{Form::submit('Nästa', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

     </div>

@stop

@section('scripts')
<script>

$.validate({
  form : '#tee'
});

</script>
@stop