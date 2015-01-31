@extends('master')

@section('content')

    {{Form::open(['route'=>'lost.store', 'class'=>'form-horizontal style-form'])}}
            <h4 class="tab-rub">Lägg till Lost & Found</h4>

            <div class="form-group">
             <label class="col-sm-2 col-sm-2 control-label">Disc</label>
             <div class="col-sm-10">

                  {{Form::text('type', '', ['class'=>'form-control'])}}
                 {{errors_for('type', $errors)}}
             </div>
            </div>

            <div class="form-group">
             <label class="col-sm-2 col-sm-2 control-label">Datum</label>
             <div class="col-sm-10">

                 {{Form::text('date', '', ['class'=>'form-control datepicker'])}}
                  <span class="help-block">Klicka på fältet för att välja datum</span>
                 {{errors_for('date', $errors)}}

             </div>
            </div>

                        <div class="form-group">
                         <label class="col-sm-2 col-sm-2 control-label">Bana</label>
                         <div class="col-sm-10">

                              {{Form::select('course', $courses, '', array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                             {{errors_for('course', $errors)}}
                         </div>
                        </div>

           <div class="form-group">
                 <label class="col-sm-2 col-sm-2 control-label">Status</label>
                 <div class="col-sm-10">
                  {{Form::select('status', ['lost'=>'Försvunnen', 'found'=>'Upphitad'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
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