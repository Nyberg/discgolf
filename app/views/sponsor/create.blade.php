@extends('db')

@section('content')

<div class="showback">
  <h4 class="mb"><i class="fa fa-angle-right"></i> Lägg till Sponsor</h4>
  {{Form::open(['route'=>'sponsor.store', 'class'=>'form-horizontal style-form', 'id'=>'sponsor', 'files' => true])}}

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Namn</label>
          <div class="col-sm-10">

            {{Form::text('name', '', ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Du måste fylla i detta fältet..'])}}

          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Länk</label>
          <div class="col-sm-10">

            {{Form::text('url', '', ['class'=>'form-control', 'data-validation'=>'url', 'data-validation-error-msg'=>'Adressen är inte korrekt..'])}}

          </div>

                     <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                          <span class="help-block">Länken måste vara http://example.com för att länka korrekt.</span>
                      </div>
      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Bild</label>
          <div class="col-sm-10">

            {{Form::file('file', '', ['class'=>'form-control', 'data-validation'=>'mime size', 'data-validation-allowing'=>'jpg, png, gif', 'data-validation-max-size'=>'512kb'])}}

          </div>
      </div>


        {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

@stop

@section('scripts')
<script>

$.validate({
  form : '#sponsor'
});

</script>
@stop