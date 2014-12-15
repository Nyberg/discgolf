@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Round</h4>
                  	   {{Form::open(['url'=>'/round/add/score', 'class'=>'form-horizontal style-form'])}}

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Pick Course</label>
                              <div class="col-sm-10">

                                {{Form::select('id', $courses,'',array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}

                              </div>
                          </div>

                            {{Form::submit('Next', ['class'=>'btn btn-primary'])}}
                              {{Form::close()}}
                      </div>
                      </div>
          		</div><!-- col-lg-12-->


		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop