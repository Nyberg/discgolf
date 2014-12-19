@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Add Club</h4>
                  	   {{Form::open(['route'=>'club.store', 'class'=>'form-horizontal style-form', 'files' => true])}}

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
                                              <label class="col-sm-2 col-sm-2 control-label">Information</label>
                                              <div class="col-sm-10">
                                                  {{Form::textarea('information', '', ['class'=>'form-control'])}} </div>

                                              <label class="col-sm-2 col-sm-2 control-label"></label>
                                              <div class="col-sm-10">
                                                  <span class="help-block"></span>
                                              </div>
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