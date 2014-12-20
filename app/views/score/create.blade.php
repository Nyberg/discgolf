@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
          		 <div class="form-panel">

          		 <h4><i class="fa fa-angle-right"></i> Create Round - {{$course->name}}</h4><hr>
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

            <h4 class="mb"><i class="fa fa-angle-right"></i> Add Score</h4>
            {{Form::open(['route'=>'round.store', 'class'=>'form-horizontal style-form'])}}
            {{Form::hidden('course_id', $course->id)}}
            {{Form::hidden('holes', $course->holes)}}
            {{Form::hidden('round_id', $round->id)}}

               @foreach($course->hole as $hole)

               {{Form::hidden('hole_id-'.$hole->number.'', $hole->id)}}

               {{Form::hidden('par-'.$hole->number.'', $hole->par)}}

                      <div class="form-group">
                           <label class="col-sm-2 col-sm-2 control-label">Hole</label>
                           <div class="col-sm-4">

                            {{Form::number('number-'.$hole->number.'', $hole->number, array('class'=>'form-control'))}}

                           </div>

                           <label class="col-sm-2 col-sm-2 control-label">Score</label>
                           <div class="col-sm-4">
                        {{Form::number('score-'.$hole->number.'', null, ['class'=>'form-control'])}}
                          </div>
                       </div>

              @endforeach
             {{Form::submit('Next', ['class'=>'btn btn-primary'])}}
             {{Form::close()}}
                </div>
          		</div><!-- col-lg-12-->
    	</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop