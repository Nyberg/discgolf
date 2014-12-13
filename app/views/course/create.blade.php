@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Course</h4>
                  	   {{Form::open(['route'=>'course.store', 'class'=>'form-horizontal style-form', 'files' => true])}}

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Name</label>
                              <div class="col-sm-10">

                                  {{Form::text('name', '', ['class'=>'form-control'])}}
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Country</label>
                              <div class="col-sm-10">
                                  {{Form::text('country', '', ['class'=>'form-control'])}}

                              </div>
                          </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">State/Region</label>
                            <div class="col-sm-10">
                                {{Form::text('state', '', ['class'=>'form-control'])}}

                            </div>
                        </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">City</label>
                              <div class="col-sm-10">
                                  {{Form::text('city', '', ['class'=>'form-control'])}}

                              </div>
                          </div>

                         <div class="form-group">
                         <label class="col-sm-2 col-sm-2 control-label">Holes</label>
                         <div class="col-sm-10">
                             {{Form::number('holes', '', ['class'=>'form-control', 'id'=>'submit_holes'])}} </div>

                         <label class="col-sm-2 col-sm-2 control-label"></label>
                         <div class="col-sm-10">
                             <span class="help-block">Insert number of holes, example: 18</span>
                         </div>
                     </div>

                           <div class="form-group">
                                              <label class="col-sm-2 col-sm-2 control-label">Information</label>
                                              <div class="col-sm-10">
                                                  {{Form::text('information', '', ['class'=>'form-control', 'id'=>'submit_holes'])}} </div>

                                              <label class="col-sm-2 col-sm-2 control-label"></label>
                                              <div class="col-sm-10">
                                                  <span class="help-block"></span>
                                              </div>
                                          </div>
                                <div class="form-group">
                                                   <label class="col-sm-2 col-sm-2 control-label">Club</label>
                                                   <div class="col-sm-10">
                                                       {{Form::text('club', '', ['class'=>'form-control', 'id'=>'submit_holes'])}} </div>

                                                   <label class="col-sm-2 col-sm-2 control-label"></label>
                                                   <div class="col-sm-10">
                                                       <span class="help-block">The club/organisation that maintenance the course</span>
                                                   </div>
                                               </div>
                                                     <div class="form-group">
                                                                        <label class="col-sm-2 col-sm-2 control-label">Fee</label>
                                                                        <div class="col-sm-10">
                                                                            {{Form::text('fee', '', ['class'=>'form-control', 'id'=>'submit_holes'])}} </div>

                                                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                                                        <div class="col-sm-10">
                                                                            <span class="help-block">Add fee to play, if it's free, leave empty</span>
                                                                        </div>
                                                                    </div>
                                      <div class="form-group">
                                                         <label class="col-sm-2 col-sm-2 control-label">Course Map</label>
                                                         <div class="col-sm-10">
                                                             {{Form::text('course_map', '', ['class'=>'form-control', 'id'=>'submit_holes'])}} </div>

                                                         <label class="col-sm-2 col-sm-2 control-label"></label>
                                                         <div class="col-sm-10">
                                                             <span class="help-block">Image to course map (overview).</span>
                                                         </div>
                                                     </div>
                     <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Image</label>
                          <div class="col-sm-10">
                              {{Form::file('file', '', ['class'=>'form-control'])}} </div>

                          <label class="col-sm-2 col-sm-2 control-label"></label>
                          <div class="col-sm-10">
                              <span class="help-block"></span>
                          </div>
                </div>
                      {{Form::submit('Save', ['class'=>'btn btn-primary'])}}
                        {{Form::close()}}

                      </div>





                  </div>



          		</div><!-- col-lg-12-->
          	</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop