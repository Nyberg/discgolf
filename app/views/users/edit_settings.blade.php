@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  <div class="form-horizontal style-form">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i> Edit User</h4>
                  	  {{Form::model($user, ['method'=>'PATCH', 'route'=> ['user.update', $user->id]])}}

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Username</label>
                              <div class="col-sm-10">

                                  {{Form::text('username', null, ['class'=>'form-control'])}}
                                  {{errors_for('username', $errors)}}
                              </div>
                          </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">

                                {{Form::text('email', null, ['class'=>'form-control'])}}
                                {{errors_for('email', $errors)}}
                            </div>

                        </div>

                         <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Metric</label>
                            <div class="col-sm-10">

                                {{Form::select('metric', ['m'=>'Meter', 'f'=>'Feet'],'', array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                                 <span class="help-block">Choose which metrics length will be shown in.</span>

                            </div>
                        </div>

                          {{Form::submit('Save Settings', ['class'=>'btn btn-primary'])}}
                         {{Form::close()}}

               </div>
                </div>
                  </div>
          		</div><!-- col-lg-12-->
          	</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop