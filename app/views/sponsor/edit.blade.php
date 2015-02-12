@extends('db')

@section('content')

<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera Sponsor {{$sponsor->name}}</h4>
  {{Form::model($sponsor, ['method'=>'PATCH', 'route'=> ['sponsor.update', $sponsor->id], 'files'=>true, 'id'=>'sponsor'])}}

   <div class="form-horizontal style-form">

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Namn</label>
          <div class="col-sm-10">

            {{Form::text('name', null, ['class'=>'form-control', 'data-validation'=>'required', 'data-validation-error-msg'=>'Detta fältet måste fyllas i..'])}}

          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Länk</label>
          <div class="col-sm-10">

            {{Form::text('url', null, ['class'=>'form-control', 'data-validation'=>'url', 'data-validation-error-msg'=>'Adressen är inte korrekt..'])}}

          </div>

                     <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                          <span class="help-block">Länken måste vara http://example.com för att länka korrekt.</span>
                      </div>
      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Nuvarande bild</label>
          <div class="col-sm-3">

            <img src="{{$sponsor->image}}" class="img-thumbnail" width="100%"/>

          </div>
             <div class="col-sm-7"></div>

      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Bild</label>
          <div class="col-sm-10">

            {{Form::file('file', null, ['class'=>'form-control', 'data-validation'=>'mime size', 'data-validation-allowing'=>'jpg, png, gif', 'data-validation-max-size'=>'512kb'])}}

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