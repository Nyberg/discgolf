@extends('master')

@section('content')


                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Bag</h4>
                  	   {{Form::open(['route'=>'bag.store', 'class'=>'form-horizontal style-form'])}}

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Type</label>
                              <div class="col-sm-10">

                                  {{Form::text('type', '', ['class'=>'form-control'])}}
                              </div>
                          </div>
                         {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
                         {{Form::close()}}
                </div>


@stop