@extends('db')

@section('content')

<div class="showback">

  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Sponsor {{$sponsor->name}}</h4>
  {{Form::model($sponsor, ['method'=>'PATCH', 'route'=> ['sponsor.update', $sponsor->id], 'files'=>true])}}

   <div class="form-horizontal style-form">

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Name</label>
          <div class="col-sm-10">

            {{Form::text('name', null, ['class'=>'form-control'])}}

          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Link</label>
          <div class="col-sm-10">

            {{Form::text('url', null, ['class'=>'form-control'])}}

          </div>

                     <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                          <span class="help-block">Link must be http://example.com</span>
                      </div>
      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Current Image</label>
          <div class="col-sm-3">

            <img src="{{$sponsor->image}}" class="img-thumbnail" width="100%"/>

          </div>
             <div class="col-sm-7"></div>

      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Image</label>
          <div class="col-sm-10">

            {{Form::file('file', null, ['class'=>'form-control'])}}

          </div>
      </div>


        {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

@stop