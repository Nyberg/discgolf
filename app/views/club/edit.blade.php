@extends('master')

@section('content')




                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Club</h4>
                  	    <div class="form-horizontal style-form">

                  	  {{Form::model($club, ['method'=>'PATCH', 'route'=> ['club.update', $club->id]])}}

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">

                                  {{Form::text('name', null, ['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Country</label>
                              <div class="col-sm-10">
                                  {{Form::text('country', null, ['class'=>'form-control'])}}

                              </div>
                          </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">State/Region</label>
                            <div class="col-sm-10">
                                {{Form::text('state', null, ['class'=>'form-control'])}}

                            </div>
                        </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">City</label>
                              <div class="col-sm-10">
                                  {{Form::text('city', null, ['class'=>'form-control'])}}

                              </div>
                          </div>

                           <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Website</label>
                                <div class="col-sm-10">
                                    {{Form::text('website', null, ['class'=>'form-control'])}}

                                </div>
                            </div>

                           <div class="form-group">
                                              <label class="col-sm-2 col-sm-2 control-label">Information</label>
                                              <div class="col-sm-10">
                                                  {{Form::textarea('information', null, ['class'=>'form-control'])}} </div>

                                              <label class="col-sm-2 col-sm-2 control-label"></label>
                                              <div class="col-sm-10">
                                                  <span class="help-block"></span>
                                              </div>
                                          </div>
                </div>
                      {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}


@stop