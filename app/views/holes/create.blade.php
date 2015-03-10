@extends('db')

@section('content')

<div class="showback">


          		  <h2 class="text-center page-header-custom">Existerande hål vid {{$course->name . ' - ' . $tee->color}}</h2>
          		   <div class="divider-header"></div>
                                          <table class="table table-hover">


                                              <thead>
                                              <tr>
                                                <th>Hål</th>
                                                @foreach($tee->hole as $hole)
                                                <td>{{$hole->number}}</td>
                                                @endforeach
                                              </tr>

                                              </thead>
                                              <tbody>
                                               <tr>
                                               <th>Par</th>
                                               @foreach($tee->hole as $hole)
                                               <td>{{$hole->par}}</td>


                                                @endforeach
                                               </tr>
                                               <tr>
                                               <th>Längd</th>
                                               @foreach($tee->hole as $hole)
                                               <td>{{$hole->length}}m</td>
                                               @endforeach
                                               </tr>
                                              </tbody>
                                          </table>

                        @if($number == $tee->holes)
                        @else
                      <h2 class="text-center page-header-custom">Lägg till {{$total}} mer hål vid {{$course->name . ' - ' . $tee->color}}</h2>
                      <div class="divider-header"></div>

                        {{Form::open(['route'=>'hole.store', 'class'=>'form-horizontal style-form'])}}
                        {{Form::hidden('hidden_holes', $tee->holes)}}
                        {{Form::hidden('course_id', $course->id)}}
                        {{Form::hidden('number', $number)}}
                        {{Form::hidden('id', $tee->id)}}
                        @endif


                       @for($i = $number+1; $i<=$tee->holes; $i++)


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

                       @if($number == $tee->holes)
                       <p>Du kan inte lägga till fler hål till denna banan.</p>
                       <a href=""><span class="btn btn-theme" role="button" onclick="window.history.go(-1); return false;">Tillbaka</span></a>
                       @else
                        {{Form::submit('Spara', ['class'=>'btn btn-primary btn-xs'])}}
                       {{Form::close()}}
                       @endif

</div>

@stop