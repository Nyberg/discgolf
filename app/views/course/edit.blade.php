@extends('db')

@section('content')

<div class="showback">

                    <h4 class="mb"><i class="fa fa-angle-right"></i> Redigera Bana - {{$course->name}}</h4>
                    <div class="form-horizontal style-form">
                    {{Form::model($course, ['method'=>'PATCH', 'route'=> ['course.update', $course->id], 'files'=>true])}}
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Namn</label>
                        <div class="col-sm-10">

                            {{Form::text('name', null, ['class'=>'form-control'])}}
                            {{errors_for('name', $errors)}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Land</label>
                        <div class="col-sm-10">
                            {{Form::text('country', null, ['class'=>'form-control'])}}
                            {{errors_for('country', $errors)}}

                        </div>
                          <label class="col-sm-2 col-sm-2 control-label"></label>
                             <div class="col-sm-10">
                             <span class="help-block"></span>
                             </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Landskap</label>
                        <div class="col-sm-10">
                            {{Form::text('state', null, ['class'=>'form-control'])}}
                            {{errors_for('state', $errors)}}

                        </div>
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                         <div class="col-sm-10">
                         <span class="help-block"></span>
                         </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Stad</label>
                        <div class="col-sm-10">
                            {{Form::text('city', null, ['class'=>'form-control'])}}
                            {{errors_for('city', $errors)}}

                        </div>
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                             <div class="col-sm-10">
                             <span class="help-block"></span>
                             </div>
                    </div>

                <div class="form-group">
                       <label class="col-sm-12 col-sm-12 control-label">Google Maps Location</label>
                       <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                       <div class="col-sm-4">
                           {{Form::text('long', null, ['class'=>'form-control'])}}
                           {{errors_for('long', $errors)}}</div>
                            <label class="col-sm-2 col-sm-2 control-label">Longitude</label>
                                                         <div class="col-sm-4">
                                                             {{Form::text('lat', null, ['class'=>'form-control'])}}
                                                             {{errors_for('lat', $errors)}}</div>

                       <label class="col-sm-2 col-sm-2 control-label"></label>
                       <div class="col-sm-10">
                           <span class="help-block">Gå till <a href="http://maps.google.com" target="_blank">Google Maps</a> och hämta longitude och latitude koordinaterna (ex 59.371892, 13.392974).</span>
                       </div>
                   </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Antal hål</label>
                        <div class="col-sm-10">
                            {{Form::number('holes', null, ['class'=>'form-control'])}}
                             {{errors_for('holes', $errors)}}</div>

                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <span class="help-block">Skriv in antal hål, tex 18</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Information</label>
                        <div class="col-sm-10">
                            {{Form::textarea('information', null, ['class'=>'form-control'])}}
                             </div>

                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <span class="help-block"></span>
                        </div>
                    </div>
                         <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Klubb</label>
                           <div class="col-sm-10">
                               {{Form::select('club',$clubs ,null,array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                               {{errors_for('club', $errors)}}</div>

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
                            {{Form::text('fee', null, ['class'=>'form-control', 'id'=>'submit_holes'])}} </div>
                            {{errors_for('fee', $errors)}}

                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <span class="help-block">Om det är gratis, lämna fältet blankt</span>
                        </div>
                    </div>

                      <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Bankarta</label>
                           <div class="col-sm-10">
                               {{Form::file('file-2', null, ['class'=>'form-control'])}} </div>


                           <label class="col-sm-2 col-sm-2 control-label"></label>
                           <div class="col-sm-10">
                               <span class="help-block">Bild för översikten över banan</span>
                           </div>
                       </div>

                       <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Header</label>
                                              <div class="col-sm-10">
                                                  {{Form::file('file', null, ['class'=>'form-control'])}} </div>

                                              <label class="col-sm-2 col-sm-2 control-label"></label>
                                              <div class="col-sm-10">
                                                  <span class="help-block">Bild som ska visas när man besöker banans sida></span>
                                              </div>
                                    </div>


                     <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Options</label>
                    <div class="col-sm-3">
                    {{Form::submit('Uppdatera', ['class'=>'btn btn-primary'])}}
                    {{Form::close()}}
                    </div>

                    <div class="col-sm-3">
                        <a href="/admin/holes/{{$course->id}}/add"><span class="btn btn-primary">Lägg till hål</span></a>
                    </div>
                    </div>
	                          <h4><i class="fa fa-angle-right"></i>  Redigera hål</h4><hr><table class="table table-hover">
                    	                              <thead>
                    	                              <tr>
                    	                                  <th>#</th>
                    	                                  <th>Längd</th>
                    	                                  <th>Par</th>

                    	                                  <th>Redigera</th>
                    	                                  <th>Ta bort</th>
                    	                              </tr>
                    	                              </thead>
                    	                              <tbody>
                    	                              @foreach($course->hole as $hole)
                    	                              <tr>
                    	                                  <td>{{$hole->number}}</td>
                    	                                  <td>{{$hole->length}}m</td>
                    	                                  <td>{{$hole->par}}</td>

                    	                                  <td><a href="/admin/holes/{{$hole->id}}/edit"><span class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></span></a></td>
                    	                                  <td>{{Form::open(['method'=>'DELETE', 'route'=>['hole.destroy', $hole->id]])}}
                                                        {{Form::submit('Ta bort', ['class'=>'btn btn-danger btn-xs'])}}
                                                        {{Form::close()}}</td>
                    	                              </tr>
                    	                              @endforeach

                    	                              </tbody>
                    	                          </table>
                    	                  	  </div>

@stop