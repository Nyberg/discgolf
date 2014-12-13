@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
          		<div class="form-panel">

                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Round</h4>
                  	  <div class="form-horizontal style-form">
                  	   {{Form::model($round, ['method'=>'PATCH', 'route'=> ['round.update', $round->id]])}}


                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pick Course</label>
                              <div class="col-sm-10">
                            {{Form::select('course', $courses,'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

                              </div>
                          </div>

                          <div class="form-group">
                                  <label class="col-sm-2 col-sm-2 control-label">Comment</label>
                                  <div class="col-sm-10">
                                    {{Form::text('comment', null, ['class'=>'form-control'])}}
                                    </div>
                          </div>

                            {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
                              {{Form::close()}}
                         </div>
                      </div>
            </div>



		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop