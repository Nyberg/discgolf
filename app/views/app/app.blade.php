@extends('db')

@section('content')

	<div class="showback">

    <h4 class="tab-rub text-center page-header-custom">Starta Runda</h4>

   {{Form::open(['method'=>'POST', 'route'=>['start-app-round'], 'class'=>'form-horizontal style-form', 'id'=>'round_form'])}}

      <div class="form-group">
          <label class="col-sm-1 col-sm-1 control-label">Välj Bana</label>
          <div class="col-sm-5">

         <select name="course" class="form-control teepads" id="teepads" data-validation="required" data-validation-error-msg="Du måste fylla i detta fältet..">
              <option value="0" readonly>Välj Bana</option>
              @foreach($courses as $course)
              <option id="{{$course->id}}" value="{{$course->id}}">{{$course->name}}</option>
              @endforeach
              </select>
          </div>

      </div>

      <div class="form-group">

          <div class="tee">

          <label class="col-sm-1 col-sm-1 control-label">Tee</label>
               <div class="col-sm-5">

                    <select name="teepad" class="form-control" id="target">
                    <option value="0" selected="selected">Välj teepad</option>
                    </select>

                  </div>

                  </div>

        </div>

    {{Form::submit('Starta', ['class'=>'btn btn-primary'])}}
    {{Form::close()}}
</div>

@stop


@section('scripts')

    <script>

      $(function() {
                   $(".datepicker").datepicker({
                   format: "yyyy-mm-dd"

                    })
           });

    $.validate({
      form : '#round_form'
    });

    </script>

@stop