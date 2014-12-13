@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">

                        <div class="form-panel">
                                          	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit hole {{$hole->number}}</h4>
                        <div class="form-horizontal style-form">
                                            {{Form::model($hole, ['method'=>'PATCH', 'route'=> ['hole.update', 'hole'=>$hole->id]])}}
                                            {{Form::hidden('course_id', $hole->course->id)}}

                                            {{Form::hidden('hole_par', $hole->par)}}

                         <div class="form-group">
                 <label class="col-sm-2 col-sm-2 control-label">Select Number </label>
                 <div class="col-sm-10">

                {{Form::select('number', array('1' => '1', '2' => '2', '3' => '4','5' => '5', '6' => '6', '7' => '7','8' => '8', '9' => '9', '10' => '10','11' => '11', '12' => '12', '13' => '13','14' => '14', '15' => '15', '16' => '16','17' => '17', '18' => '18', '19' => '19'),'',
                           array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

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
                       </div>
                </div>
          		</div><!-- col-lg-12-->
          	</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop