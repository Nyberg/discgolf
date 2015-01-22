@extends('master')

@section('content')


          		 <h4><i class="fa fa-angle-right"></i> Existing Holes at {{$course->name}}</h4><hr>
                                          <table class="table table-hover">


                                              <thead>
                                              <tr>
                                                <th>Hole</th>
                                                @foreach($course->hole as $hole)
                                                <td>{{$hole->number}}</td>
                                                @endforeach
                                              </tr>

                                              </thead>
                                              <tbody>
                                               <tr>
                                               <th>Par</th>
                                               @foreach($course->hole as $hole)
                                               <td>{{$hole->par}}</td>


                                                @endforeach
                                               </tr>
                                               <tr>
                                               <th>Length</th>
                                               @foreach($course->hole as $hole)
                                               <td>{{$hole->length}}m</td>
                                               @endforeach
                                               </tr>
                                              </tbody>
                                          </table>


                                          	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add {{$total}} more holes to {{$course->name}}</h4>
                        {{Form::open(['route'=>'hole.store', 'class'=>'form-horizontal style-form'])}}
                        {{Form::hidden('hidden_holes', $course->holes)}}
                        {{Form::hidden('course_id', $course->id)}}
                        {{Form::hidden('number', $number)}}



                       @for($i = $number+1; $i<=$course->holes; $i++)


                    <div class="form-group">
                         <label class="col-sm-1 col-sm-1 control-label">Hole </label>

                         <div class="col-sm-3">
                    {{Form::number('number-'.$i.'', $i, ['class'=>'form-control', 'readonly'])}}

                    </div>
                        <label class="col-sm-1 col-sm-1 control-label">Length</label>
                         <div class="col-sm-3">

                             {{Form::number('length-'.$i.'', '',['class'=>'form-control'])}}
                         </div>
                         <label class="col-sm-1 col-sm-1 control-label">Par</label>
                         <div class="col-sm-3">
                      {{Form::number('par-'.$i.'', '', ['class'=>'form-control'])}}
                        </div>




                     </div>


                       @endfor
                        {{Form::submit('Save', ['class'=>'btn btn-primary btn-xs'])}}
                       {{Form::close()}}

@stop