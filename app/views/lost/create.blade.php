@extends('master')

@section('content')

    {{Form::open(['route'=>'lost.store', 'class'=>'form-horizontal style-form'])}}
            <h4 class="tab-rub">Lägg till Lost & Found</h4>

           <div class="form-group">
                 <label class="col-sm-2 col-sm-2 control-label">Status</label>
                 <div class="col-sm-10">
                  {{Form::select('status', ['0'=>'Välj status', 'lost'=>'Försvunnen', 'found'=>'Upphitad'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control status'))}}
                 </div>
             </div>

             <div class="form-group" id="userDiscs">
              <label class="col-sm-2 col-sm-2 control-label">Disc</label>
              <div class="col-sm-10">

                <select name="type_lost" class="form-control" id="type_lost">
                                    <option value="0">Välj Disc</option>
                                    @foreach($discs as $disc)
                                    <option id="{{$disc->id}}" value="{{$disc->name}}">{{$disc->name}}</option>
                                    @endforeach
                                </select>
                  {{errors_for('type_lost', $errors)}}
              </div>
             </div>

            <div class="form-group" id="type_form">
             <label class="col-sm-2 col-sm-2 control-label">Disc</label>
             <div class="col-sm-10">

                  {{Form::text('type_found', '', ['class'=>'form-control'])}}
                 {{errors_for('type_found', $errors)}}
             </div>
            </div>

            <div class="form-group" id="datum">
             <label class="col-sm-2 col-sm-2 control-label">Datum</label>
             <div class="col-sm-10">

                 {{Form::text('date', '', ['class'=>'form-control datepicker'])}}
                  <span class="help-block">Klicka på fältet för att välja datum</span>
                 {{errors_for('date', $errors)}}

             </div>
            </div>

            <div class="form-group" id="bana">
             <label class="col-sm-2 col-sm-2 control-label">Bana</label>
             <div class="col-sm-10">

               <select name="course" class="form-control course" id="course">
                    <option value="0">Välj Bana</option>
                    @foreach($courses as $course)
                    <option id="{{$course->id}}" value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
                    {{errors_for('course', $errors)}}
             </div>
            </div>

         {{Form::submit('Rapportera', ['class'=>'btn btn-success'])}}
    {{Form::close()}}
@stop

@section('scripts')

    <script>

    $('.datepicker').datepicker({
    startDate: '-3d'
    })

    </script>

@stop