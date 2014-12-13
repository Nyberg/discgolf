@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
          		 <div class="form-panel">

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



                       @for($i = 1; $i<=$total; $i++)


                    <div class="form-group">
                         <label class="col-sm-1 col-sm-1 control-label">Hole </label>

                         <div class="col-sm-3">

            {{Form::select('number-'.$i.'', array('1' => '1', '2' => '2', '3'=>'3', '4' => '4','5' => '5', '6' => '6', '7' => '7','8' => '8', '9' => '9', '10' => '10','11' => '11', '12' => '12', '13' => '13','14' => '14', '15' => '15', '16' => '16','17' => '17', '18' => '18', '19' => '19'),'',
                        array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

                    </div>
                        <label class="col-sm-1 col-sm-1 control-label">Length</label>
                         <div class="col-sm-3">

                             {{Form::number('length-'.$i.'', '',['class'=>'form-control', 'placeholder'=>'Length'])}}
                         </div>
                         <label class="col-sm-1 col-sm-1 control-label">Par</label>
                         <div class="col-sm-3">
                      {{Form::number('par-'.$i.'', '', ['class'=>'form-control', 'placeholder'=>'Par'])}}
                        </div>




                     </div>


                       @endfor
                        {{Form::submit('Save', ['class'=>'btn btn-primary btn-xs'])}}
                       {{Form::close()}}
                </div>
          		</div><!-- col-lg-12-->
          	</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop