@extends('db')

@section('content')


<div class="showback">

                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera Klubb - {{$club->name}}</h4>
                  	    <div class="form-horizontal style-form">

                  	  {{Form::model($club, ['method'=>'PATCH', 'route'=> ['club.update', $club->id], 'files' => true])}}

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                              <div class="col-sm-10">

                                  {{Form::text('name', null, ['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Land</label>
                            <div class="col-sm-10">
                                      <select name="country" class="form-control teepads" id="teepads">
                                                           <option value="{{$club->country->id}}">{{$club->country->country}}</option>
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
                                   <option value="{{$club->state->id}}">{{$club->state->state}}</option>
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
                                     <option value="{{$club->city->id}}">{{$club->city->city}}</option>
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
                                    {{Form::text('website', null, ['class'=>'form-control'])}}

                                </div>
                            </div>

                           <div class="form-group">
                               <label class="col-sm-2 col-sm-2 control-label">Nuvarande header</label>
                               <div class="col-sm-10">
                                  <img src="{{$club->image}}" width="100%"/>
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
                                                  {{Form::textarea('information', null, ['class'=>'form-control'])}} </div>

                                              <label class="col-sm-2 col-sm-2 control-label"></label>
                                              <div class="col-sm-10">
                                                  <span class="help-block"></span>
                                              </div>
                                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Medlemskap</label>
                              <div class="col-sm-10">
                                  {{Form::textarea('membership', null, ['class'=>'form-control'])}} </div>

                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <span class="help-block"></span>
                              </div>
                          </div>
                </div>
                      {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}


@stop