@extends('db')

@section('content')

<div class="showback">

                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Lägg till Bana</h4>

                  	   {{Form::open(['route'=>'course.store', 'class'=>'form-horizontal style-form', 'files' => true])}}

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
                              <label class="col-sm-12 col-sm-12 control-label">Google Maps Location</label>
                              <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                              <div class="col-sm-4">
                                  {{Form::text('long', '', ['class'=>'form-control'])}}
                                  {{errors_for('long', $errors)}}</div>

                                   <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                                <div class="col-sm-4">
                                    {{Form::text('lat', '', ['class'=>'form-control'])}}
                                    {{errors_for('lat', $errors)}}</div>


                              <label class="col-sm-2 col-sm-2 control-label"></label>
                              <div class="col-sm-10">
                                  <span class="help-block">Gå till <a href="http://maps.google.com" target="_blank">Google Maps</a> och hämta longitude och latitude koordinaterna (ex 59.371892, 13.392974).</span>
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
                                                   <label class="col-sm-2 col-sm-2 control-label">Klubb</label>
                                                   <div class="col-sm-10">
                                                       {{Form::select('club',$clubs ,'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}} </div>
                                                       {{errors_for('club', $errors)}}

                                                   <label class="col-sm-2 col-sm-2 control-label"></label>
                                                   <div class="col-sm-10">
                                                       <span class="help-block">Klubben/Orginisationen som underhåller banan.</span>
                                                   </div>
                                               </div>

                                                                        <div class="form-group">
                                                                         <label class="col-sm-2 col-sm-2 control-label">Status</label>
                                                                         <div class="col-sm-10">
                                                                             {{Form::select('status', [0=>'Inactive', 1=>'Active'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                                                                           </div>
                                                                         <label class="col-sm-2 col-sm-2 control-label"></label>
                                                                         <div class="col-sm-10">
                                                                             <span class="help-block">Om banan är inaktiv kan ingen lägga till rundor.</span>
                                                                         </div>
                                                                     </div>


                                                      <div class="form-group">
                                                        <label class="col-sm-2 col-sm-2 control-label">Avigft</label>
                                                        <div class="col-sm-10">
                                                            {{Form::text('fee', '', ['class'=>'form-control', 'id'=>'submit_holes'])}} </div>
                                                            {{errors_for('fee', $errors)}}

                                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                                        <div class="col-sm-10">
                                                            <span class="help-block">Om det är gratis, lämna fältet blankt</span>
                                                        </div>
                                                    </div>
                                      <div class="form-group">
                                                         <label class="col-sm-2 col-sm-2 control-label">Bankarta</label>
                                                         <div class="col-sm-10">
                                                             {{Form::file('course_map', '', ['class'=>'form-control'])}} </div>


                                                         <label class="col-sm-2 col-sm-2 control-label"></label>
                                                         <div class="col-sm-10">
                                                             <span class="help-block">Bild för översikten över banan</span>
                                                         </div>
                                                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Header</label>
                          <div class="col-sm-10">
                              {{Form::file('file', '', ['class'=>'form-control'])}} </div>

                          <label class="col-sm-2 col-sm-2 control-label"></label>
                          <div class="col-sm-10">
                              <span class="help-block">Bild som ska visas när man besöker banans sida</span>
                          </div>
                </div>
                      {{Form::submit('Spara', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}


@stop