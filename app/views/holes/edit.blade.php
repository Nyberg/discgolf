@extends('master')

@section('content')

                                          	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit hole {{$hole->number}}</h4>
                        <div class="form-horizontal style-form">
                                            {{Form::model($hole, ['method'=>'PATCH', 'route'=> ['hole.update', 'hole'=>$hole->id], 'files'=>true])}}
                                            {{Form::hidden('course_id', $hole->course->id)}}

                                            {{Form::hidden('hole_par', $hole->par)}}

                         <div class="form-group">
                 <label class="col-sm-2 col-sm-2 control-label">Select Number </label>
                 <div class="col-sm-10">

                 {{Form::number('number', null, ['class'=>'form-control'])}}

                 </div>
                 </div>
                 <div class="form-group">
                 <label class="col-sm-2 col-sm-2 control-label">Length</label>
                      <div class="col-sm-10">
                   {{Form::number('length', null, ['class'=>'form-control'])}}
                     </div>
                </div>
                <div class="form-group">
                 <label class="col-sm-2 col-sm-2 control-label">Par</label>
                 <div class="col-sm-10">
              {{Form::number('par', null, ['class'=>'form-control'])}}
                </div>
                </div>

                 <div class="form-group">
                     <label class="col-sm-2 col-sm-2 control-label">Hole Image</label>
                     <div class="col-sm-3">
                  {{Form::file('file', null, ['class'=>'form-control'])}}
                    </div>

                 <label class="col-sm-2 col-sm-2 control-label">Image type</label>
                     <div class="col-sm-5">
                  {{Form::select('check',array('0'=>'No, this is not a hole overview image.', '1'=>'Yes, this image can be used to add where throws landed.'),null,array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                    </div>
                </div>

                <div class="form-group">
                   <label class="col-sm-2 col-sm-2 control-label">Ob Rules </label>

                  <div class="col-sm-10">

               {{Form::text('ob', $hole->detail['ob'], ['class'=>'form-control'])}}
                 </div>
                 <label class="col-sm-2 col-sm-2 control-label"></label>
                                          <div class="col-sm-10">
                                              <span class="help-block">Add additional information about Ob rules for this hole.</span>
                                          </div>
                 </div>


                                             </div>

                        {{Form::submit('Save', ['class'=>'btn btn-primary btn-xs'])}}
                       {{Form::close()}}

@stop