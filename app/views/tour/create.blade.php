@extends('db')

@section('content')

<div class="showback">

 <h4 class="tab-rub text-center page-header-custom">Lägg till tävling</h4>
        <div class="divider-header"></div>

    {{Form::open(['method' => 'post', 'route'=>'tour.store', 'id'=>'tour_form', 'class'=>'form-horizontal'])}}

        <div class="col-sm-12">

                    <div class="form-group">
                    <label class="col-sm-1 col-sm-1 control-label">Namn</label>
                    <div class="col-sm-5">
                    {{Form::text('name', '', ['class'=>'form-control'])}}
                    </div>

                      <label class="col-sm-1 col-sm-1 control-label">Ansvarig Klubb</label>
                      <div class="col-sm-5">
                        {{Form::select('club', $clubs, '', ['data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'])}}
                      </div>
                </div>
        </div>

<div class="col-sm-12">
    <div class="form-group">
     <label class="col-sm-1 col-sm-1 control-label">Antal rundor</label>
        <div class="col-sm-5">
        {{Form::number('rounds', '', ['class'=>'form-control', 'data-validation'=>'number', 'data-validation-error-msg'=>'Du kan endast fylla i nummer här..'])}}
        </div>

            <label class="col-sm-1 col-sm-1 control-label">Datum</label>
                 <div class="col-sm-5">
                     {{Form::text('date', '', ['class'=>'form-control datepicker', 'data-validation'=>'required', 'data-validation-error-msg'=>'Du måste fylla i detta fält..'])}}
                      <span class="help-block">Klicka på fältet för att välja datum</span>
                     {{errors_for('date', $errors)}}
                 </div>
    </div>
</div>

<div class="col-sm-12">
 <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Land</label>
        <div class="col-sm-10">
          <select name="country" class="form-control teepads" id="teepads">
                               <option value="0">Välj Land</option>
                               @foreach($countries as $country)
                               <option id="{{$country->id}}" value="{{$country->id}}">{{$country->country}}</option>
                               @endforeach
                               </select>
           {{errors_for('country', $errors)}}
           </div>
        </div>


        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Landskap</label>
        <div class="col-sm-10">
        <select name="state" class="form-control teepads" id="teepads">
        <option value="0">Välj Landskap</option>
        @foreach($states as $state)
        <option id="{{$state->id}}" value="{{$state->id}}">{{$state->state}}</option>
        @endforeach
        </select>
        {{errors_for('state', $errors)}}
        </div>
        </div>


        <div class="form-group">
        <label class="col-sm-2 col-sm-2 control-label">Stad</label>
        <div class="col-sm-10">
        <select name="city" class="form-control teepads" id="teepads">
         <option value="0">Välj Stad</option>
         @foreach($cities as $city)
         <option id="{{$city->id}}" value="{{$city->id}}">{{$city->city}}</option>
         @endforeach
         </select>
        {{errors_for('city', $errors)}}
        </div>
        </div>
</div>

    <div class="col-sm-12">
            <div class="form-group">
                <label class="col-sm-1 col-sm-1 control-label">Information</label>
                     <div class="col-sm-11">
                         {{Form::textarea('information', '', ['class'=>'form-control'])}}
                         {{errors_for('comment', $errors)}}
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