@extends('master')

@section('content')


          		 <h4><i class="fa fa-angle-right"></i> Existerande hål vid {{$course->name}}</h4>
                                          <table class="table table-hover">


                                              <thead>
                                              <tr>
                                                <th>Hål</th>
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
                                               <th>Längd</th>
                                               @foreach($course->hole as $hole)
                                               <td>{{$hole->length}}m</td>
                                               @endforeach
                                               </tr>
                                              </tbody>
                                          </table>

                        @if($number == $course->holes)
                        @else
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Lägg till {{$total}} mer hål vid {{$course->name}}</h4>

                        {{Form::open(['route'=>'hole.store', 'class'=>'form-horizontal style-form'])}}
                        {{Form::hidden('hidden_holes', $course->holes)}}
                        {{Form::hidden('course_id', $course->id)}}
                        {{Form::hidden('number', $number)}}
                        @endif


                       @for($i = $number+1; $i<=$course->holes; $i++)


                    <div class="form-group">
                         <label class="col-sm-1 col-sm-1 control-label">Hål </label>

                         <div class="col-sm-3">
                    {{Form::number('number-'.$i.'', $i, ['class'=>'form-control', 'readonly'])}}

                    </div>
                        <label class="col-sm-1 col-sm-1 control-label">Längd</label>
                         <div class="col-sm-3">

                             {{Form::number('length-'.$i.'', '',['class'=>'form-control'])}}
                         </div>
                         <label class="col-sm-1 col-sm-1 control-label">Par</label>
                         <div class="col-sm-3">
                      {{Form::number('par-'.$i.'', '', ['class'=>'form-control'])}}
                        </div>




                     </div>


                       @endfor

                       @if($number == $course->holes)
                       <p>Du kan inte lägga till fler hål till denna banan.</p>
                       <a href=""><span class="btn btn-theme" role="button" onclick="window.history.go(-1); return false;">Tillbaka</span></a>
                       @else
                        {{Form::submit('Save', ['class'=>'btn btn-primary btn-xs'])}}
                       {{Form::close()}}
                       @endif

@stop