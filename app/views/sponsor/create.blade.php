@extends('db')

@section('content')

<div class="showback">
  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Sponsor</h4>
  {{Form::open(['route'=>'sponsor.store', 'class'=>'form-horizontal style-form', 'files' => true])}}

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Name</label>
          <div class="col-sm-10">

            {{Form::text('name', '', ['class'=>'form-control'])}}

          </div>
      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Link</label>
          <div class="col-sm-10">

            {{Form::text('url', '', ['class'=>'form-control'])}}

          </div>

                     <label class="col-sm-2 col-sm-2 control-label"></label>
                      <div class="col-sm-10">
                          <span class="help-block">Link must be http://example.com to redirect correctly</span>
                      </div>
      </div>

      <div class="form-group">
          <label class="col-sm-2 col-sm-2 control-label">Image</label>
          <div class="col-sm-10">

            {{Form::file('file', '', ['class'=>'form-control'])}}

          </div>
      </div>


        {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
     {{Form::close()}}

@stop