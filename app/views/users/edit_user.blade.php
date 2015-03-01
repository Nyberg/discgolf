@extends('db')

@section('content')

<div class="showback">

                        <div class="bs-example">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a data-toggle="tab" href="#sectionA">Inställningar</a></li>
                            <li><a data-toggle="tab" href="#sectionB">Profil</a></li>
                        </ul>
                  <div class="form-horizontal style-form">
                    <div class="tab-content">

                        <div id="sectionA" class="tab-pane fade in active">
                               <br/>
                           	  <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera Användare</h4>

                                      	  {{Form::model($user, ['method'=>'PATCH', 'route'=> ['user.update', $user->id], 'files'=>true])}}

                                              <div class="form-group">
                                                  <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                                                  <div class="col-sm-5">

                                                      {{Form::text('first_name', null, ['class'=>'form-control'])}}
                                                      {{errors_for('first_name', $errors)}}
                                                      </div>
                                                      <div class="col-sm-5">
                                                      {{Form::text('last_name', null, ['class'=>'form-control'])}}
                                                      {{errors_for('last_name', $errors)}}
                                                  </div>
                                              </div>

                                            <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">

                                                    {{Form::text('email', null, ['class'=>'form-control'])}}
                                                    {{errors_for('email', $errors)}}
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                  <label class="col-sm-2 col-sm-2 control-label">Klubb</label>
                                                  <div class="col-sm-10">


                                                {{Form::select('club',$clubs , $user->club_id, ['data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'])}}


                                                  </div>
                                              </div>

                                             <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Metric</label>
                                                <div class="col-sm-10">

                                                    {{Form::select('metric', ['m'=>'Meter', 'f'=>'Feet'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                                                     <span class="help-block">Välj vilken typ längd ska visas i</span>

                                                </div>
                                            </div>

                                               <div class="form-group">
                                                <label class="col-sm-2 col-sm-2 control-label">Profilbild</label>
                                                  <div class="col-sm-10">
                                                     <img src="{{$user->image}}" class="img-thumbnail" width="100px" height="100px"/>

                                                      {{Form::file('file', null, ['class'=>'form-control'])}} </div>


                                                  <label class="col-sm-2 col-sm-2 control-label"></label>
                                                  <div class="col-sm-10">
                                                      <span class="help-block"></span>
                                                  </div>
                                                </div>

                                              {{Form::submit('Spara Inställningar', ['class'=>'btn btn-primary'])}}
                                             {{Form::close()}}




                         </div>



                        <div id="sectionB" class="tab-pane fade">
                        <br/>
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera Profil</h4>
                                              	  {{Form::model($user->profile, ['method'=>'PATCH', 'route'=> ['user.update', $user->id], 'files'=>true])}}

                                                     <div class="form-group">
                                                         <label class="col-sm-2 col-sm-2 control-label">Land</label>
                                                         <div class="col-sm-10">
                                                                   <select name="country" class="form-control teepads" id="teepads">
                                                                                        <option value="{{$user->profile->country->id}}">{{$user->profile->country->country}}</option>
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
                                                                <option value="{{$user->profile->state->id}}">{{$user->profile->state->state}}</option>
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
                                                                  <option value="{{$user->profile->city->id}}">{{$user->profile->city->city}}</option>
                                                                  @foreach($cities as $city)
                                                                  <option id="{{$city->id}}" value="{{$city->id}}">{{$city->city}}</option>
                                                                  @endforeach
                                                                  </select>
                                                              {{errors_for('city', $errors)}}
                                                              </div>
                                                         </div>
                                                      <div class="form-group">
                                                           <label class="col-sm-2 col-sm-2 control-label">Adress</label>
                                                           <div class="col-sm-10">

                                                               {{Form::text('location', null, ['class'=>'form-control'])}}
                                                               {{errors_for('location', $errors)}}
                                                           </div>
                                                       </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 col-sm-2 control-label">Telefon</label>
                                                        <div class="col-sm-10">

                                                            {{Form::text('phone', null, ['class'=>'form-control'])}}
                                                            {{errors_for('phone', $errors)}}
                                                        </div>

                                                    </div>

                                                      <div class="form-group">
                                                            <label class="col-sm-2 col-sm-2 control-label">Hemsida</label>
                                                            <div class="col-sm-10">

                                                                {{Form::text('website', null, ['class'=>'form-control'])}}
                                                                {{errors_for('website', $errors)}}
                                                            </div>
                                                        </div>

                                                     <div class="form-group">
                                                        <label class="col-sm-2 col-sm-2 control-label">Information</label>
                                                        <div class="col-sm-10">
                                                            {{Form::textarea('info', null, ['class'=>'form-control'])}}

                                                        </div>
                                                    </div>

                                                      {{Form::submit('Uppdatera Profil', ['class'=>'btn btn-primary'])}}
                                                     {{Form::close()}}
                        </div>
                        </div>
                         </div>

                        </div>
                    </div>
                </div>

@stop