@extends('admin/admin')

@section('content')

 <section id="main-content">
          <section class="wrapper">

          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">




                    <div class="form-panel">
                        <div class="bs-example">
                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#sectionA">Settings</a></li>
                            <li><a data-toggle="tab" href="#sectionB">Profile</a></li>

                        </ul>
                  <div class="form-horizontal style-form">
                    <div class="tab-content">

                        <div id="sectionA" class="tab-pane fade in active">
                               <br/>
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

                                                    {{Form::select('metric', ['m'=>'Meter', 'f'=>'Feet'], null, array('data-toggle'=>'dropdown-select', 'data-style'=>'primary', 'class'=>'form-control'))}}
                                                     <span class="help-block">Choose which metrics length will be shown in.</span>

                                                </div>
                                            </div>

                                              {{Form::submit('Save Settings', ['class'=>'btn btn-primary'])}}
                                             {{Form::close()}}

                         </div>



                        <div id="sectionB" class="tab-pane fade">
                        <br/>
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Edit Profile</h4>
                                              	  {{Form::model($user->profile, ['method'=>'PATCH', 'route'=> ['user.update', $user->id]])}}

                                                      <div class="form-group">
                                                          <label class="col-sm-2 col-sm-2 control-label">Country</label>
                                                          <div class="col-sm-10">

                                                              {{Form::text('country', null, ['class'=>'form-control'])}}
                                                              {{errors_for('country', $errors)}}
                                                          </div>
                                                      </div>
                                                      <div class="form-group">
                                                            <label class="col-sm-2 col-sm-2 control-label">State/Region</label>
                                                            <div class="col-sm-10">

                                                                {{Form::text('state', null, ['class'=>'form-control'])}}
                                                                {{errors_for('state', $errors)}}
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                              <label class="col-sm-2 col-sm-2 control-label">City</label>
                                                              <div class="col-sm-10">

                                                                  {{Form::text('city', null, ['class'=>'form-control'])}}
                                                                  {{errors_for('city', $errors)}}
                                                              </div>
                                                          </div>

                                                    <div class="form-group">
                                                        <label class="col-sm-2 col-sm-2 control-label">Phone</label>
                                                        <div class="col-sm-10">

                                                            {{Form::text('phone', null, ['class'=>'form-control'])}}
                                                            {{errors_for('phone', $errors)}}
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                          <label class="col-sm-2 col-sm-2 control-label">Club</label>
                                                          <div class="col-sm-10">

                                                              {{Form::text('club', null, ['class'=>'form-control'])}}
                                                              {{errors_for('club', $errors)}}
                                                          </div>
                                                      </div>

                                                      <div class="form-group">
                                                            <label class="col-sm-2 col-sm-2 control-label">Website</label>
                                                            <div class="col-sm-10">

                                                                {{Form::text('website', null, ['class'=>'form-control'])}}
                                                                {{errors_for('website', $errors)}}
                                                            </div>
                                                        </div>

                                                     <div class="form-group">
                                                        <label class="col-sm-2 col-sm-2 control-label">Information</label>
                                                        <div class="col-sm-10">
                                                            {{Form::text('information', null, ['class'=>'form-control'])}}

                                                        </div>
                                                    </div>

                                                      {{Form::submit('Update Profile', ['class'=>'btn btn-primary'])}}
                                                     {{Form::close()}}


                        </div>

                    </div>
                </div>
                </div></div>

          	</div><!-- /row -->

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
@stop