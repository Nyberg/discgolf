@extends('master')

@section('content')




                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Skapa Klubb</h4>
                  	   {{Form::open(['route'=>'club.store', 'class'=>'form-horizontal style-form', 'files' => true])}}

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                              <div class="col-sm-10">

                                  {{Form::text('name', '', ['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Land</label>
                              <div class="col-sm-10">
                                  {{Form::text('country', '', ['class'=>'form-control'])}}

                              </div>
                          </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Landskap</label>
                            <div class="col-sm-10">
                                {{Form::text('state', '', ['class'=>'form-control'])}}

                            </div>
                        </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Stad</label>
                              <div class="col-sm-10">
                                  {{Form::text('city', '', ['class'=>'form-control'])}}

                              </div>
                          </div>

                               <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Hemsida</label>
                                <div class="col-sm-10">
                                    {{Form::text('website', '', ['class'=>'form-control'])}}

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Header</label>
                                <div class="col-sm-10">
                                    {{Form::file('file', '', ['class'=>'form-control'])}}

                                </div>
                            </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Information</label>
                              <div class="col-sm-10">
                                  {{Form::textarea('information', '', ['class'=>'form-control'])}} </div>

                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <span class="help-block"></span>
                              </div>
                          </div>
                          {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
                          {{Form::close()}}
                </div>


                      </div>

@stop