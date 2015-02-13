@extends('db')

@section('content')


<div class="showback">

                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Skapa Klubb</h4>
                  	   {{Form::open(['route'=>'club.store', 'class'=>'form-horizontal style-form', 'files' => true])}}

                      <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                          <div class="col-sm-10">

                              {{Form::text('name', '', ['class'=>'form-control'])}}
                              {{errors_for('name', $errors)}}
                          </div>
                      </div>

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

                          <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Medlemskap</label>
                                <div class="col-sm-10">
                                    {{Form::textarea('membership', '', ['class'=>'form-control'])}} </div>

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