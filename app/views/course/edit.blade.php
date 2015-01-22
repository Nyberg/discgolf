@extends('master')

@section('content')


                    <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Course {{$course->name}}</h4>
                    <div class="form-horizontal style-form">
                    {{Form::model($course, ['method'=>'PATCH', 'route'=> ['course.update', $course->id], 'files'=>true])}}
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">

                            {{Form::text('name', null, ['class'=>'form-control'])}}
                            {{errors_for('name', $errors)}}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                            {{Form::text('country', null, ['class'=>'form-control'])}}
                            {{errors_for('country', $errors)}}

                        </div>
                          <label class="col-sm-2 col-sm-2 control-label"></label>
                             <div class="col-sm-10">
                             <span class="help-block">Please add city and location, example:  Stockholm, Sweden</span>
                             </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                            {{Form::text('state', null, ['class'=>'form-control'])}}
                            {{errors_for('state', $errors)}}

                        </div>
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                         <div class="col-sm-10">
                         <span class="help-block">Please add city and location, example:  Stockholm, Sweden</span>
                         </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Country</label>
                        <div class="col-sm-10">
                            {{Form::text('city', null, ['class'=>'form-control'])}}
                            {{errors_for('city', $errors)}}

                        </div>
                        <label class="col-sm-2 col-sm-2 control-label"></label>
                             <div class="col-sm-10">
                             <span class="help-block">Please add city and location, example:  Stockholm, Sweden</span>
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
                           <span class="help-block">Go to <a href="http://maps.google.com" target="_blank">Google Maps</a> and grab the longitude and latitude coordinates (ex 59.371892, 13.392974).</span>
                       </div>
                   </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Holes</label>
                        <div class="col-sm-10">
                            {{Form::number('holes', null, ['class'=>'form-control'])}}
                             {{errors_for('holes', $errors)}}</div>

                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <span class="help-block">Insert number of holes, example: 18</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Holes</label>
                        <div class="col-sm-10">
                            {{Form::textarea('information', null, ['class'=>'form-control'])}}
                             </div>

                        <label class="col-sm-2 col-sm-2 control-label"></label>
                        <div class="col-sm-10">
                            <span class="help-block">Insert number of holes, example: 18</span>
                        </div>
                    </div>
                         <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Club</label>
                           <div class="col-sm-10">
                               {{Form::select('club',$clubs ,null,array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                               {{errors_for('club', $errors)}}</div>

                           <label class="col-sm-2 col-sm-2 control-label"></label>
                           <div class="col-sm-10">
                               <span class="help-block">The club/organisation that maintenance the course</span>
                           </div>
                       </div>

                         <div class="form-group">
                          <label class="col-sm-2 col-sm-2 control-label">Status</label>
                          <div class="col-sm-10">
                              {{Form::select('status', [0=>'Inactive', 1=>'Active'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                            </div>
                          <label class="col-sm-2 col-sm-2 control-label"></label>
                          <div class="col-sm-10">
                              <span class="help-block">If course is inactive, no one can add rounds to it.</span>
                          </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label">Course Map</label>
                           <div class="col-sm-10">
                               {{Form::file('file-2', null, ['class'=>'form-control'])}} </div>


                           <label class="col-sm-2 col-sm-2 control-label"></label>
                           <div class="col-sm-10">
                               <span class="help-block"></span>
                           </div>
                       </div>

                       <div class="form-group">
                                            <label class="col-sm-2 col-sm-2 control-label">Image</label>
                                              <div class="col-sm-10">
                                                  {{Form::file('file', null, ['class'=>'form-control'])}} </div>

                                              <label class="col-sm-2 col-sm-2 control-label"></label>
                                              <div class="col-sm-10">
                                                  <span class="help-block"></span>
                                              </div>
                                    </div>


                     <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Options</label>
                    <div class="col-sm-3">
                    {{Form::submit('Update', ['class'=>'btn btn-primary'])}}
                    {{Form::close()}}
                    </div>
                    <div class="col-sm-3">
                    <a href="/admin/holes/{{$course->id}}/add"><span class="btn btn-primary">Add holes</span></a>
                    </div>
                    </div>
	                          <h4><i class="fa fa-angle-right"></i>  Edit Holes</h4><hr><table class="table table-hover">
                    	                              <thead>
                    	                              <tr>
                    	                                  <th>#</th>
                    	                                  <th>Length</th>
                    	                                  <th>Par</th>

                    	                                  <th>Edit</th>
                    	                                  <th>Delete</th>
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
                                                        {{Form::submit('Delete', ['class'=>'btn btn-danger btn-xs'])}}
                                                        {{Form::close()}}</td>
                    	                              </tr>
                    	                              @endforeach

                    	                              </tbody>
                    	                          </table>
                    	                  	  </div>

@stop