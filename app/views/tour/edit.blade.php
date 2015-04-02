@extends('db')

@section('content')

<div class="showback">

 <h4 class="tab-rub text-center page-header-custom">Lägg till tävling</h4>
        <div class="divider-header"></div>

   {{Form::model($tour, ['method'=>'PATCH', 'route'=> ['tour.update', $tour->id], 'files'=>true, 'class'=>'form-horizontal'])}}

        <div class="col-sm-12">

                    <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Namn</label>
                    <div class="col-sm-5">
                    {{Form::text('name', null, ['class'=>'form-control'])}}
                    </div>

                      <label class="col-sm-1 col-sm-1 control-label">Ansvarig Klubb</label>
                      <div class="col-sm-5">
                        {{Form::select('club', $clubs, $tour->club->name, ['data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'])}}
                      </div>
                </div>
        </div>

<div class="col-sm-12">
    <div class="form-group">
     <label class="col-sm-1 col-sm-1 control-label">Antal rundor</label>
        <div class="col-sm-5">
        {{Form::number('rounds', null, ['class'=>'form-control', 'data-validation'=>'number', 'data-validation-error-msg'=>'Du kan endast fylla i nummer här..'])}}
        </div>

            <label class="col-sm-1 col-sm-1 control-label">Datum</label>
                 <div class="col-sm-5">
                     {{Form::text('date', null, ['class'=>'form-control datepicker', 'data-validation'=>'required', 'data-validation-error-msg'=>'Du måste fylla i detta fält..'])}}
                      <span class="help-block">Klicka på fältet för att välja datum</span>
                 </div>
    </div>
</div>

    <div class="col-sm-12">
            <div class="form-group">
                <label class="col-sm-1 col-sm-1 control-label">Information</label>
                     <div class="col-sm-11">
                         {{Form::textarea('information', null, ['class'=>'form-control'])}}
                     </div>
            </div>
    </div>

    {{Form::submit('Nästa', ['class'=>'btn btn-primary'])}}
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
      form : '#tour_form'
    });

    </script>

@stop